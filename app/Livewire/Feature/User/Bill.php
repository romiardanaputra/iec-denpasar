<?php

namespace App\Livewire\Feature\User;

use App\Models\Transaction\Order;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Bill')]
class Bill extends Component
{
    public $orders;

    public $pendingOrders;

    public function mount()
    {
        $this->fetchOrders();
    }

    public function fetchOrders()
    {
        $this->orders = Order::with(['program', 'payments'])->where('user_id', auth()->user()->id)->get();
        $this->pendingOrders = $this->orders->filter(function ($order) {
            $lastPayment = $order->payments()->latest()->first();

            return $lastPayment == null || $lastPayment->status == 'PENDING' || $lastPayment->status == 'EXPIRED';
        });
    }

    public function render()
    {
        $data = [
            'orders' => $this->orders,
            'pendingOrders' => $this->pendingOrders,
        ];

        return view('livewire.feature.user.bill', $data);
    }
}
