<?php

namespace App\Livewire\Feature\User;

use Livewire\Component;

#[\Livewire\Attributes\Title('Dashboard')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.feature.user.dashboard');
    }
}
