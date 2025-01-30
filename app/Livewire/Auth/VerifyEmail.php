<?php

namespace App\Livewire\Auth;

use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

#[\Livewire\Attributes\Title('Verify Email Confirmation')]

class VerifyEmail extends Component
{
    // public EmailVerificationRequest $request;

    // public function __invoke()
    // {
    //   try {
    //     $user = $this->request->user();
    //     // dd($user);
    //     // auth()->user()->hasVerifiedEmail();
    //     if (!$user->hasVerifiedEmail()) {
    //       if ($user->markEmailAsVerified()) {
    //         event(new Verified($user));
    //       }
    //     }

    //     return redirect()->route('dashboard', ['verified' => 1]);
    //   } catch (\Throwable $e) {
    //     Log::error('error when verifying email address', ['error' => $e->getMessage()]);
    //     report($e);
    //   }

    // }

    public $verificationStatus;

    public function mount(EmailVerificationRequest $request)
    {
        try {
            $user = Auth::user();
            if ($user->hasVerifiedEmail()) {
                $this->verificationStatus = 'already_verified';
            } else {
                if ($user->markEmailAsVerified()) {
                    event(new Verified($user));
                    $this->verificationStatus = 'success';
                } else {
                    $this->verificationStatus = 'failed';
                }
            }
        } catch (\Exception $e) {
            $this->verificationStatus = 'error';
        }
    }

    public function redirectToDashboard()
    {
        return redirect()->route('dashboard')->with('verified', 1);
    }

    public function render()
    {
        return view('livewire.auth.verify-email');
    }
}
