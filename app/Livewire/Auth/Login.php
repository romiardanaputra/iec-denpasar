<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

class Login extends Component
{
    public $email = '';

    public $password = '';

    public $remmember = false;

    public function render()
    {
        return view('livewire.auth.login');
    }

    protected function rules()
    {
        return [
            'email' => ['required', 'string', 'lowercase', 'email:rfc,dns'],
            'password' => ['required'],
        ];
    }

    public function login()
    {

        $this->validate();
        $throttleKey = strtolower($this->email).'|'.request()->ip();
        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $this->addError('email', __('auth.throttle', [
                'seconds' => RateLimiter::availableIn($throttleKey),
            ]));

            return null;
        }
        if (auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remmember)) {
            $user = User::where(['email' => $this->email])->first();
            auth()->login($user, $this->remmember);

            return redirect()->intended(route('dashboard', absolute: false));
        } else {
            RateLimiter::hit($throttleKey);

            return $this->addError('email', trans('auth.failed'));
        }
    }

    public function mount()
    {
        $this->fill(['email' => 'email@gmail.com', 'password' => 'secret']);
    }
}
