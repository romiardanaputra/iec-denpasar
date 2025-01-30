<?php

namespace App\Livewire;

use Livewire\Component;

#[\Livewire\Attributes\Title('Landing')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.index');
    }
}
