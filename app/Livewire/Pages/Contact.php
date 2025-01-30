<?php

namespace App\Livewire\Pages;

use Livewire\Component;

#[\Livewire\Attributes\Title('Contact')]
class Contact extends Component
{
    public function render()
    {
        return view('livewire.pages.contact');
    }
}
