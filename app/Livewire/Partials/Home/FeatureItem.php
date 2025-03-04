<?php

namespace App\Livewire\Partials\Home;

use Livewire\Component;

class FeatureItem extends Component
{
    public $icon;

    public $iconColor;

    public $backgroundColor;

    public $title;

    public $description;

    public function render()
    {

        return view('livewire.partials.home.feature-item');
    }
}
