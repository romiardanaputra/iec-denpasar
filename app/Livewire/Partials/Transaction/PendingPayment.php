<?php

namespace App\Livewire\Partials\Transaction;

use Livewire\Component;

#[\Livewire\Attributes\Title('Payment pending')]

class PendingPayment extends Component
{
    public function render()
    {
        return view('livewire.partials.transaction.pending-payment');
    }
}
