<?php

namespace App\Livewire\Feature\User;

use Livewire\Component;

#[\Livewire\Attributes\Title('Dashboard')]
class Dashboard extends Component
{
    public $user;

    public function mount()
    {
        $authUser = auth()->user();
        if ($authUser && $authUser->hasVerifiedEmail()) {
            $this->user = $authUser;
        } else {
            abort(404);
        }
    }

    public function redirectToProgram()
    {
        return redirect()->route('our-program');
    }

    public function render()
    {
        $data = [
            'user' => $this->user,
        ];

        return view('livewire.feature.user.dashboard', $data);
    }
}
