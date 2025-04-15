<?php

namespace App\Livewire\Feature\User;

use App\Models\User;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
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

    public $avatar;

    public $current_password;

    public $password;

    public $password_confirmation;

    public $user;

    public function render()
    {
        SEOMeta::setTitle('My Profile - IEC Denpasar');
        SEOMeta::setDescription('Manage and update your personal profile information.');
        SEOMeta::setCanonical(url()->current());

        OpenGraph::setTitle('My Profile - IEC Denpasar');
        OpenGraph::setDescription('Manage and update your personal profile information.');
        OpenGraph::setType('profile');
        OpenGraph::setUrl(url()->current());

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
            'phone' => ['required', 'string', Rule::unique(User::class)->ignore($this->user->id)],
            'address' => ['nullable', 'string'],
            'about' => ['nullable', 'string'],
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
        logger('Validated Data: '.json_encode($validatedData)); // Log data yang divalidasi
        logger('User Before Update: '.json_encode($this->user->toArray())); // Log data user sebelum update
        $this->user->update($validatedData);
        logger('User After Update: '.json_encode($this->user->toArray())); // Log data user setelah update
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
