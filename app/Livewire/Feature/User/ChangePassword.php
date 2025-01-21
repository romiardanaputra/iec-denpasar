<?php

namespace App\Livewire\Feature\User;

use Livewire\Component;

class ChangePassword extends Component
{
    public $current_pass;

    public $confirm_pass;

    public $new_password;

    public function render()
    {
        return view('livewire.feature.user.change-password');
    }
}
