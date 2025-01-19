<?php

namespace App\Livewire\Feature\User;

use Livewire\Component;

class Profile extends Component
{
    public $name;

    public $email;

    public $address;

    public $phone;

    public $about;

    public function render()
    {
        return view('livewire.feature.user.profile');
    }
}
