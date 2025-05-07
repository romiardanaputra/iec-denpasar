<?php

namespace App\Http\Controllers;

use App\Models\Program\Program;
use App\Models\Transaction\Order;
use App\Models\Transaction\OrderItem;
use App\Models\Transaction\Payment;
use App\Models\Transaction\Registration;
use App\Services\MidtransService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function success()
    {
        return view('livewire.partials.transaction.payment-success');
    }

    public function pending()
    {
        return view('livewire.partials.transaction.pending-payment');
    }

    public function error()
    {
        return view('livewire.partials.transaction.failed-payment');
    }

    public function checkOrderStatus()
    {
        $user = Auth::user();
        if (! $user) {
            return response()->json(['has_unpaid_order' => false]);
        }

        $unpaidOrder = Order::where('user_id', $user->id)
            ->where('payment_status', 'unpaid')
            ->first();

        return response()->json(['has_unpaid_order' => $unpaidOrder !== null]);
    }

    public function saveErrorData(Request $request)
    {
        $errorData = $request->validate([
            'code' => 'required|string',
            'message' => 'required|string',
        ]);

        $request->session()->put('error_data', $errorData);

        return response()->json(['status' => 'success']);
    }

    public function midtransCallback(MidtransService $midtransService)
    {
        Log::info('Midtrans callback diterima');
        if ($midtransService->isSignatureKeyVerified()) {
            $order = $midtransService->getOrder();
            if (! $order) {
                Log::error('Order not found for order ID: '.$midtransService->getOrder()->order_id);

                return response()->json([
                    'success' => false,
                    'message' => 'Order not found',
                ], 404);
            }
            $status = $midtransService->getStatus();
            switch ($status) {
                case 'success':
                    $order->update([
                        'status' => 'Completed',
                        'payment_status' => 'paid',
                    ]);
                    $lastPayment = $order->payments()->latest()->first();
                    if ($lastPayment) {
                        $lastPayment->update([
                            'status' => 'PAID',
                            'paid_at' => now(),
                        ]);
                    }
                    break;
                case 'pending':
                    $order->update([
                        'status' => 'pending',
                        'payment_status' => 'unpaid',
                    ]);

                    break;
                case 'expire':
                    $order->update([
                        'status' => 'pending',
                        'payment_status' => 'expired',
                    ]);

                    break;
                case 'cancel':
                    $order->update([
                        'status' => 'cancelled',
                        'payment_status' => 'cancelled',
                    ]);

                    break;
                case 'failed':
                    $order->update([
                        'status' => 'failed',
                        'payment_status' => 'failed',
                    ]);

                    break;
                default:
                    Log::warning('Unknown transaction status: '.$status);

                    return response()->json([
                        'success' => false,
                        'message' => 'Unknown transaction status',
                    ], 400);
            }

            return response()->json([
                'success' => true,
                'message' => 'Notifikasi berhasil diproses',
            ]);
        } else {
            Log::error('Signature key verification failed');

            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }

    public function checkout(Request $request, Program $program, MidtransService $midtransService)
    {
        Log::info('fungsi checkout dipanggil');

        $user = Auth::user();
        if (! $user) {
            return response()->json([
                'message' => 'the current user is not authenticated',
            ], 401);
        }

        if (! $program) {
            return response()->json([
                'message' => 'Program not found',
            ], 404);
        }

        Log::info('validasi data form detail pendaftar kursus');
        $data = $request->validate([
            'student_name' => ['required', 'min:3', 'max:50', 'string'],
            'birthplace' => ['required', 'string', 'min:3', 'max:50'],
            'birthdate' => ['required', 'date'],
            'address' => ['required', 'string'],
            'education' => ['required'],
            'job' => ['required'],
            'market' => ['required'],
            'parent_guardian' => ['nullable', 'string', 'max:255'],
            'payment_method' => ['required', 'in:online,cash'], // Add validation for payment method
        ]);

        Log::info('cek status biaya pendaftaran');
        $now = now();
        $registerFee = $program->register_fee;
        $userNeedsRegisterFee = true;

        if ($user->student_card_number) {
            $lastRegistration = Registration::where('user_id', $user->id)
                ->orderByDesc('created_at')
                ->first();

            if ($lastRegistration) {
                $lastActiveDate = $lastRegistration->created_at;
                $monthsInactive = $lastActiveDate->diffInMonths($now);

                if ($monthsInactive < 2) { // <= 2 bulan
                    $registerFee = 0;
                    $userNeedsRegisterFee = false;
                }
            }
        }

        Log::info('buat data pendaftar setelah validasi');
        $customer = Registration::create([
            'user_id' => $user->id,
            'program_id' => $program->program_id,
            'student_name' => $data['student_name'],
            'birthplace' => $data['birthplace'],
            'birthdate' => $data['birthdate'],
            'address' => $data['address'],
            'education' => $data['education'],
            'job' => $data['job'],
            'market' => $data['market'],
            'parent_guardian' => $data['parent_guardian'] ?? null,
        ]);
        Log::info('data pendaftar = '.$customer.' berhasil dibuat');

        Log::info('buat data order dari customer');
        $totalPrice = $program->price + $registerFee;
        $order = Order::create([
            'user_id' => $user->id,
            'program_id' => $customer->program_id,
            'registration_id' => $customer->id,
            'total_price' => $totalPrice,
            'payment_method' => $data['payment_method'],
            'status' => 'pending',
        ]);
        $order->order_id = 'ORD-IEC-'.now()->format('Ymd').'-'.str_pad($order->id, 4, '0', STR_PAD_LEFT);
        $order->save();
        Log::info('data order customer = '.$order.' berhasil dibuat');

        Log::info('buat data order item');
        $orderItem = OrderItem::create([
            'order_id' => $order->id,
            'program_id' => $program->program_id,
            'quantity' => 1,
            'price' => $program->price,
            'product_name' => $program->name,
        ]);

        if ($registerFee > 0) {
            // Tambahkan OrderItem untuk biaya pendaftaran jika ada
            OrderItem::create([
                'order_id' => $order->id,
                'program_id' => $order->program_id,
                'quantity' => 1,
                'price' => $registerFee,
                'product_name' => 'Biaya Pendaftaran',
            ]);
        }

        Log::info('order item = '.$orderItem.' berhasil di buat');

        if ($data['payment_method'] === 'online') {
            Log::info('processing online payment');

            $snapToken = $midtransService->createSnapToken($order);
            Log::info('snaptoken berhasil di generate: '.$snapToken);

            Log::info('buat data payment online');
            $payment = Payment::create([
                'order_id' => $order->id,
                'amount' => $order->total_price,
                'snap_token' => $snapToken,
                'status' => 'PENDING',
                'expired_at' => now()->addHours(24),
            ]);

            Log::info('data payment method online '.$payment.' berhasil dibuat');

            session()->flash('success', $userNeedsRegisterFee
              ? 'Checkout berhasil. Anda dikenakan biaya pendaftaran karena tidak aktif lebih dari 2 bulan.'
              : 'Checkout berhasil. Anda bebas dari biaya pendaftaran.');

            return response()->json([
                'snap_token' => $snapToken,
                'payment_method' => 'online',
            ]);
        } else {
            // Handle cash payment
            Log::info('processing cash payment');

            $payment = Payment::create([
                'order_id' => $order->id,
                'amount' => $order->total_price,
                'status' => 'PENDING',
            ]);

            Log::info('data payment method cash '.$payment.' berhasil dibuat');

            // You might want to send notification to admin about cash payment
            // Notification::send($adminUsers, new CashPaymentNotification($order));

            session()->flash('success', $userNeedsRegisterFee
              ? 'Checkout berhasil. Anda dikenakan biaya pendaftaran karena tidak aktif lebih dari 2 bulan. Silakan datang ke kantor IEC Denpasar untuk melunasi pembayaran.'
              : 'Checkout berhasil. Anda bebas dari biaya pendaftaran. Silakan datang ke kantor IEC Denpasar untuk melunasi pembayaran.');

            return response()->json([
                'payment_method' => 'cash',
                'redirect_url' => route('payment.pending'), // Or any other route
            ]);
        }
    }
}
