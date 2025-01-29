<?php

namespace App\Livewire\Auth;

use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Livewire\Component;

#[\Livewire\Attributes\Title('Verify Email Confirmation')]

class VerifyEmail extends Component
{
    public EmailVerificationRequest $request;

    public function verify()
    {
        $user = $this->request->user();
        dd($user);

        if (! $user->hasVerifiedEmail()) {
            if ($user->markEmailAsVerified()) {
                event(new Verified($user));
            }
        }

        return redirect()->route('dashboard', ['verified' => 1]);
    }

    public function render()
    {
        return view('livewire.auth.verify-email');
    }
}
