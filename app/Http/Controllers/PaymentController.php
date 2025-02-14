<?php

namespace App\Http\Controllers;

use App\Models\Program\Program;
use App\Models\Transaction\Order;
use App\Models\Transaction\OrderItem;
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

    public function saveErrorData(Request $request)
    {
        $errorData = $request->validate([
            'code' => 'required|string',
            'message' => 'required|string',
        ]);

        $request->session()->put('error_data', $errorData);

        return response()->json(['status' => 'success']);
    }

    public function midtransCallback(Request $request, MidtransService $midtransService)
    {
        Log::info('Midtrans callback received');
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
                        'status' => 'processing',
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
                        'status' => 'cancelled',
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
        Log::info('checkout method is called');
        $user = Auth::user();
        if (! $user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }
        $data = $request->validate([
            'student_name' => 'required|string|max:255',
            'birthplace' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'address' => 'required|string',
            'education' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'market' => 'required|string|max:255',
            'parent_guardian' => 'nullable|string|max:255',
        ]);
        Registration::create([
            'user_id' => $user->id,
            'program_id' => $program->program_id,
            ...$data,
        ]);
        $order = Order::create([
            'user_id' => $user->id,
            'program_id' => $program->program_id,
            'order_id' => uniqid('ORD-'),
            'total_price' => $program->price,
        ]);
        OrderItem::create([
            'order_id' => $order->id,
            'program_id' => $program->program_id,
            'quantity' => 1,
            'price' => $program->price,
            'product_name' => $program->name,
        ]);
        $snapToken = $midtransService->createSnapToken($order);
        Log::info('snaptoken created: '.$snapToken);

        return response()->json([
            'snap_token' => $snapToken,
        ]);
    }
}
