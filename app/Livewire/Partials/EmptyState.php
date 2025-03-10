<?php

namespace App\Livewire\Partials;

use Livewire\Component;

class EmptyState extends Component
{
    public $title;

    public $message;

    public $iconType = 'default'; // default, blog, program, custom

    public $customIcon;

    public $buttonText;

    public $buttonAction;

    protected $listeners = ['refresh' => '$refresh'];

    public function render()
    {
        return view('livewire.partials.empty-state');
    }
}
