<?php

namespace App\Livewire\Feature\User;

use Livewire\Component;

#[\Livewire\Attributes\Title('Exam grade')]
class ExamGrade extends Component
{
    public function render()
    {
        return view('livewire.feature.user.exam-grade');
    }
}
