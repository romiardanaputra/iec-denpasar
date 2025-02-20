<?php

namespace App\Livewire\Feature\User;

use App\Models\Transaction\Order;
use Livewire\Attributes\Computed;
use Livewire\Component;

#[\Livewire\Attributes\Title('Dashboard')]
class Dashboard extends Component
{
    public $user;

    #[Computed]
    public function getOrder()
    {
        if (auth()->check() && auth()->user()->hasVerifiedEmail()) {
            return cache()->remember('user_order_'.auth()->user()->id, now()->addMinutes(15), function () {
                return Order::with(['program'])->where('user_id', auth()->user()->id)->first();
            });
        }

        return null;
    }

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
            'order' => $this->getOrder(),
        ];

        return view('livewire.feature.user.dashboard', $data);
    }
}
