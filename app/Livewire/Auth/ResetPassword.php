<?php

namespace App\Livewire\Auth;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Livewire\Component;

#[\Livewire\Attributes\Title('Reset Password')]

class ResetPassword extends Component
{
    public $token;

    public $email;

    public $password;

    public $password_confirmation;

    public function render()
    {
        return view('livewire.auth.reset-password');
    }

    public function rules()
    {
        return [
            'token' => ['required'],
            'email' => ['required', 'email', 'lowercase'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation' => ['required'],
        ];
    }

    public function resetPassword()
    {
        $this->validate();
        $status = Password::reset(
            $this->only(['email', 'password', 'password_confirmation', 'token']),
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();
                event(new PasswordReset($user));
            }
        );

        return $status == Password::PASSWORD_RESET
          ? redirect()->route('login')->with('status', __($status))
          : back()->withInput($this->only('email'))->withErrors(['email' => __($status)]);
    }
}
