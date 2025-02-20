<?php

namespace App\Livewire\Feature\User;

use App\Models\Feature\Grade;
use Livewire\Attributes\Computed;
use Livewire\Component;

#[\Livewire\Attributes\Title('Exam grade')]
class ExamGrade extends Component
{
    #[Computed]
    public function getExamGrade()
    {

        $userId = auth()->id();

        $grades = Grade::with([
            'registration.program' => function ($query) {
                $query->where('is_visible', 1);
            },
            'registration.orders' => function ($query) use ($userId) {
                $query->where('status', 'completed')
                    ->where('payment_status', 'paid')
                    ->where('user_id', $userId);
            },
            'user',
        ])
            ->orderBy('level_name', 'ASC')
            ->whereHas('registration.program', function ($query) {
                $query->where('is_visible', 1);
            })
            ->whereHas('registration.orders', function ($query) use ($userId) {
                $query->where('status', 'completed')
                    ->where('payment_status', 'paid')
                    ->where('user_id', $userId);
            })
            ->where('user_id', $userId)
            ->get();

        return $grades;
    }

    public function mount()
    {
        $this->checkAuthUser();
    }

    private function isUserAuthorized()
    {
        return auth()->check() && auth()->user()->hasVerifiedEmail();
    }

    public function checkAuthUser()
    {
        if (! $this->isUserAuthorized()) {
            session()->flash('error', 'You must be logged in and have verified your email to access this page.');

            return to_route('login');
        }
    }

    public function render()
    {

        $data = [
            'grades' => $this->getExamGrade(),
        ];
        // dd($data);

        return view('livewire.feature.user.exam-grade', $data);
    }
}
