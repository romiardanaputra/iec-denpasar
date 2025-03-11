<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Transaction\Order;
use App\Services\MidtransService;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::get();
        $data = [
            'orders' => $orders,
        ];

        return view('livewire.feature.user.bill', $data);
    }

    /**
     * @throws \Exception
     */
    public function show(MidtransService $midtransService, Order $order)
    {
        // get last payment
        $payment = $order->payments->last();

        if ($payment == null || $payment->status == 'EXPIRED') {
            $snapToken = $midtransService->createSnapToken($order);

            $order->payments()->create([
                'snap_token' => $snapToken,
                'status' => 'PENDING',
            ]);
        } else {
            $snapToken = $payment->snap_token;
        }

        return view('livewire.feature.user.bill-detail', compact('order', 'snapToken'));
    }
}
