<?php

namespace App\Livewire\Feature\User;

use App\Models\Transaction\Order;
use App\Services\MidtransService;
use Livewire\Component;

class BillDetail extends Component
{
    public $order;

    public $snapToken;

    public function mount(MidtransService $midtransService, $order)
    {
        $this->order = Order::with('payments')->findOrFail($order);

        // Get last payment
        $payment = $this->order->payments->last();

        if ($payment == null || $payment->status == 'EXPIRED') {
            $this->snapToken = $midtransService->createSnapToken($this->order);

            $this->order->payments()->create([
                'snap_token' => $this->snapToken,
                'status' => 'PENDING',
            ]);
        } else {
            $this->snapToken = $payment->snap_token;
        }
    }

    public function render()
    {
        $data = [
            'order' => $this->order,
        ];

        return view('livewire.feature.user.bill-detail', $data);
    }
}
