<?php

namespace App\Livewire\Feature\User;

use Livewire\Component;

#[\Livewire\Attributes\Title('Schedule')]

class Schedule extends Component
{
    public function render()
    {
        return view('livewire.feature.user.schedule');
    }
}
