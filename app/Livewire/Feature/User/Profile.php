<?php

namespace App\Livewire\Feature\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

#[\Livewire\Attributes\Title('Profile')]
class Profile extends Component
{
    public $name;

    public $email;

    public $address;

    public $phone;

    public $about;

    public $city;

    public $postal_code;

    public $country_code;

    public $avatar;

    public $current_password;

    public $password;

    public $password_confirmation;

    public $user;

    #[\Livewire\Attributes\Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.feature.user.profile');
    }

    public function mount()
    {
        $this->getAuthUser();
        $this->initializeFields();
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user->id)],
            'phone' => ['required', 'phone:AUTO', Rule::unique(User::class)->ignore($this->user->id)],
            'address' => ['nullable', 'string'],
            'about' => ['nullable', 'string'],
            'city' => ['nullable', 'string', 'max:255'],
            'postal_code' => ['nullable', 'string', 'max:10'],
            'country_code' => ['nullable', 'string', 'max:3'],
            'avatar' => ['nullable', 'string'],
        ];
    }

    protected function passwordRules()
    {
        return [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required'],
        ];
    }

    public function initializeFields()
    {
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->address = $this->user->address;
        $this->about = $this->user->about;
        $this->city = $this->user->city ?? 'Indonesia';
        $this->postal_code = $this->user->postal_code ?? '80361';
        $this->country_code = $this->user->country_code ?? 'ID';
        $this->avatar = $this->user->gauth_avatar;
    }

    public function getAuthUser()
    {
        if (auth()->check() && auth()->user()->hasVerifiedEmail()) {
            $this->user = Auth::user();
        } else {
            $this->user = null;
        }
    }

    public function saveProfile()
    {
        $validatedData = $this->validate();
        $this->user->update($validatedData);
        session()->flash('status', 'Profile updated successfully.');
    }

    public function resetPassword()
    {
        $validatedData = $this->validate($this->passwordRules());

        $this->user->update([
            'password' => Hash::make($validatedData['password']),
        ]);

        session()->flash('success_reset_password', 'Password updated successfully.');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
