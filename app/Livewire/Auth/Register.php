<?php

namespace App\Livewire\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use Livewire\Component;
use Throwable;

#[\Livewire\Attributes\Title('Register')]
class Register extends Component
{
    public $name = '';

    public $phone = '';

    public $password = '';

    public $password_confirmation = '';

    public $email = '';

    public $showPassword = false;

    public $showConfirmPassword = false;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'min:4'],
            'phone' => ['required', 'phone:AUTO', 'unique:'.User::class],
            'email' => ['required', 'string', 'lowercase', 'email:dns,rfc', 'unique:'.User::class, 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    public function togglePasswordVisibility()
    {
        $this->showPassword = ! $this->showPassword;
    }

    public function toggleConfirmPasswordVisibility()
    {
        $this->showConfirmPassword = ! $this->showConfirmPassword;
    }

    public function store()
    {
        try {
            $data = $this->validate();
            $data['password'] = Hash::make($this->password);
            $data['phone'] = phone($this->phone)->formatE164();
            $user = User::create($data);
            $user->assignRole(Role::find(2));
            event(new Registered($user));
            Auth::login($user);

            return redirect(route('dashboard', absolute: false));
        } catch (Throwable $e) {
            Log::error('User registration failed', ['error' => $e->getMessage()]);
            session()->flash('error', $e->getMessage());
            report($e);
        }
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
