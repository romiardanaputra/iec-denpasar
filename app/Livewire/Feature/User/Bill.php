<?php

namespace App\Livewire\Feature\User;

use Livewire\Component;

#[\Livewire\Attributes\Title('Bill')]

class Bill extends Component
{
    public function render()
    {
        return view('livewire.feature.user.bill');
    }
}
