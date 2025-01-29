<?php

namespace App\Livewire\Auth;

use Livewire\Component;

#[\Livewire\Attributes\Title('logout')]

class Logout extends Component
{
    public function logout()
    {
        auth()->logout();

        return redirect('/login');
    }

    public function render()
    {
        return view('livewire.auth.logout');
    }
}
