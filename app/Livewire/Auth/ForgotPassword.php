<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Component;

#[\Livewire\Attributes\Title('Forgot Password')]
class ForgotPassword extends Component
{
    public $email;

    public function render()
    {
        return view('livewire.auth.forgot-password');
    }

    public function rules()
    {
        return [
            'email' => ['required', 'lowercase', 'email'],
        ];
    }

    public function store()
    {
        $this->validate();
        $status = Password::sendResetLink($this->only('email'));

        return $status == Password::RESET_LINK_SENT
          ? back()->with('status', __($status))
          : back()->withInput($this->only('email'))->withErrors(['email' => __($status)]);
    }
}
