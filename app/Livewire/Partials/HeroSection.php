<?php

namespace App\Livewire\Partials;

use Livewire\Component;

class HeroSection extends Component
{
    public $title;

    public $highlightedText;

    public $subTitle;

    public $ctaButton;

    public function render()
    {
        return view('livewire.partials.hero-section');
    }
}
