<?php

namespace App\Livewire\Feature\User;

use App\Models\Transaction\Order;
use App\Services\MidtransService;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

class BillDetail extends Component
{
    public $order;

    public $snapToken;

    public function mount(MidtransService $midtransService, $order)
    {
        $this->order = Order::with(['payments', 'user', 'program', 'items'])->findOrFail($order);

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

        SEOMeta::setTitle('Bill Details');
        SEOMeta::setDescription('View detailed information about your bill and payment status.');
        SEOMeta::setCanonical(url()->current());

        OpenGraph::setTitle('Bill Details');
        OpenGraph::setDescription('View detailed information about your bill and payment status.');
        OpenGraph::setType('bill_detail');
        OpenGraph::setUrl(url()->current());
        $data = [
            'order' => $this->order,
        ];
        // dd($data);

        return view('livewire.feature.user.bill-detail', $data);
    }
}
