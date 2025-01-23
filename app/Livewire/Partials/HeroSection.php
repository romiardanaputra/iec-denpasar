<?php

namespace App\Livewire\Partials;

use Livewire\Component;

class HeroSection extends Component
{
    public $title;

    public $breadcrumb;

    public $routeName;

    public function render()
    {
        return view('livewire.partials.hero-section');
    }
}
