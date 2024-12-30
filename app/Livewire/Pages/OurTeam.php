<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class OurTeam extends Component
{
    public $breadcrumb;

    public $title;

    public $routeName;

    public function render()
    {
        return view('livewire.pages.our-team');
    }
}
