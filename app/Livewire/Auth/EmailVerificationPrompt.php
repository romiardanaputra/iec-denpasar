<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

#[\Livewire\Attributes\Title('Verify Email Prompt')]
class EmailVerificationPrompt extends Component
{
    public function render()
    {
        return Auth::user()->hasVerifiedEmail()
          ? redirect()->route('dashboard')
          : view('livewire.auth.email-verification-prompt');
    }

    public function sendVerificationEmail()
    {
        if (! Auth::user()->hasVerifiedEmail()) {
            Auth::user()->sendEmailVerificationNotification();
            session()->flash('status', 'Verification link sent!');
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        session()->invalidate();
        session()->regenerateToken();

        return to_route('landing');
    }
}
