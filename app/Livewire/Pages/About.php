<?php

namespace App\Livewire\Pages;

use Livewire\Component;

#[\Livewire\Attributes\Title('About')]

class About extends Component
{
    public function render()
    {
        return view('livewire.pages.about');
    }
}
