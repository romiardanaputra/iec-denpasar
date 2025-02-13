<?php

namespace App\Livewire\Partials\Transaction;

use Livewire\Component;

#[\Livewire\Attributes\Title('Payment Success')]
class PaymentSuccess extends Component
{
    public function render()
    {
        return view('livewire.partials.transaction.payment-success');
    }
}
