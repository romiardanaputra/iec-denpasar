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

    public $isLoading = false;

    protected $middleware = ['throttle:10,1'];

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
        try {
            $this->isLoading = true;
            $validated = $this->validate();
            $validated['password'] = Hash::make($this->password);
            $validated['phone'] = phone($validated['phone'])->formatE164();
            $user = User::create($validated);
            $user->assignRole(Role::find(2));
            event(new Registered($user));
            Auth::login($user);

            return redirect(route('dashboard', absolute: false));
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->isLoading = false;
            throw $e;
        } catch (Throwable $e) {
            $this->isLoading = false;
            Log::error('User registration failed', ['error' => $e->getMessage()]);
            session()->flash('error', $e->getMessage());
            report($e);
        } finally {
            $this->isLoading = false;
        }
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
