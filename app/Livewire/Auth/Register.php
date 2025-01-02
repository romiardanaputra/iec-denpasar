<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Component;

class Register extends Component
{
    public $full_name;

    public $phone;

    public $password;

    public $password_confirmation;

    public $email;

    protected function rules()
    {
        return [
            'full_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'phone:AUTO', 'unique:'.User::class],
            'email' => ['required', 'string', 'lowercase', 'email:dns,rfc', 'unique:'.User::class, 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    public function store()
    {
        $data = $this->validate();
        $data['password'] = Hash::make($this->password);
        $data['phone'] = phone($this->phone)->formatE164();
        $user = User::create($data);
        event(new Registered($user));
        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
