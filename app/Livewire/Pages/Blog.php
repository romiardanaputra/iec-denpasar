<?php

namespace App\Livewire\Pages;

use Livewire\Component;

#[\Livewire\Attributes\Title('Blog')]
class Blog extends Component
{
    public function render()
    {
        return view('livewire.pages.blog');
    }
}
