<?php

namespace App\Livewire\Feature\User;

use Livewire\Component;

#[\Livewire\Attributes\Title('Class info')]
class ClassInfo extends Component
{
    public function render()
    {
        return view('livewire.feature.user.class-info');
    }
}
