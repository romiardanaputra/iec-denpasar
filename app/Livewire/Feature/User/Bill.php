<?php

namespace App\Livewire\Feature\User;

use App\Models\Transaction\Order;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Bill')]
class Bill extends Component
{
    public $orders;

    public $pendingOrders;

    public $paidOrders;

    public $failedOrders;

    public $expiredOrders;

    public $startDate;

    public $endDate;

    public $programName;

    public function mount()
    {
        $this->fetchOrders();
    }

    public function fetchOrders()
    {
        $query = Order::with(['program', 'payments'])
            ->where('user_id', auth()->user()->id)
            ->orderByDesc('id');

        if ($this->startDate && $this->endDate) {
            $query->whereBetween('created_at', [$this->startDate, $this->endDate]);
        }

        if ($this->programName) {
            $query->whereHas('program', function ($q) {
                $q->where('name', 'like', '%'.$this->programName.'%');
            });
        }

        $this->orders = $query->get();

        $this->pendingOrders = $this->orders->filter(function ($order) {
            $lastPayment = $order->payments()->latest()->first();

            return $lastPayment == null || $lastPayment->status == 'PENDING';
        });

        $this->paidOrders = $this->orders->filter(function ($order) {
            $lastPayment = $order->payments()->latest()->first();

            return $lastPayment && $lastPayment->status == 'PAID';
        });

        $this->failedOrders = $this->orders->filter(function ($order) {
            $lastPayment = $order->payments()->latest()->first();

            return $lastPayment && $lastPayment->status == 'FAILED';
        });

        $this->expiredOrders = $this->orders->filter(function ($order) {
            $lastPayment = $order->payments()->latest()->first();

            return $lastPayment && $lastPayment->status == 'EXPIRED';
        });
    }

    public function applyFilters()
    {
        $this->fetchOrders();
    }

    public function resetFilters()
    {
        $this->startDate = null;
        $this->endDate = null;
        $this->programName = null;
        $this->fetchOrders();
    }

    public function render()
    {
        SEOMeta::setTitle('My Bills');
        SEOMeta::setDescription('View and manage your payment bills and pending orders.');
        SEOMeta::setCanonical(url()->current());

        OpenGraph::setTitle('My Bills');
        OpenGraph::setDescription('View and manage your payment bills and pending orders.');
        OpenGraph::setType('bill');
        OpenGraph::setUrl(url()->current());

        $data = [
            'orders' => $this->orders,
            'pendingOrders' => $this->pendingOrders,
            'paidOrders' => $this->paidOrders,
            'failedOrders' => $this->failedOrders,
            'expiredOrders' => $this->expiredOrders,
        ];

        return view('livewire.feature.user.bill', $data);
    }
}
