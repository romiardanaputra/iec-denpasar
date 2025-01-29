<?php

namespace App\Livewire\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Component;

#[\Livewire\Attributes\Title('Register')]
class Register extends Component
{
    public $name = '';

    public $phone = '';

    public $password = '';

    public $password_confirmation = '';

    public $email = '';

    public function render()
    {
        return view('livewire.auth.register');
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'min:4'],
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
        $user->assignRole(Role::find(2));
        event(new Registered($user));
        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
