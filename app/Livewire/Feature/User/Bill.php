<?php

namespace App\Livewire\Feature\User;

use App\Models\Transaction\Order;
use App\Services\MidtransService;
use Livewire\Component;

#[\Livewire\Attributes\Title('Bill')]

class Bill extends Component
{
    public function showTransaction(MidtransService $midtransService, Order $order)
    {
        $payment = $order->payments()->last();
        if ($payment == null || $payment->status == 'EXPIRED') {
            $snapToken = $midtransService->createSnapToken($order);

            $order->payments()->create([
                'snap_token' => $snapToken,
                'status' => 'PENDING',
            ]);
        } else {
            $snapToken = $payment->snap_token;
        }
    }

    public function render()
    {
        $orders = Order::with(['program'])->where('user_id', auth()->user()->id)->get();
        $data = [
            'orders' => $orders,
        ];

        // dd($data);
        return view('livewire.feature.user.bill', $data);
    }
}
