<?php

namespace App\Livewire\Feature\User;

use App\Models\Feature\Grade;
use App\Models\Transaction\Registration;
use Livewire\Attributes\Computed;
use Livewire\Component;

#[\Livewire\Attributes\Title('Exam grade')]
class ExamGrade extends Component
{
    #[Computed]
    public function getExamGrade()
    {
        // Enable query logging

        // Get the authenticated user's ID
        $userId = auth()->id();

        // Query with whereHas for registration.program
        $grades = Grade::with([
            'registration.program' => function ($query) {
                $query->where('is_visible', 1);
            },
            'registration.orders',
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

        // Dump the executed queries
        // dd($grades);

        return $grades;
    }

    // padi active program only shoe once and then admin must be updated the data
    public function getProgram() {}

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
