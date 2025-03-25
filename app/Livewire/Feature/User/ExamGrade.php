<?php

namespace App\Livewire\Feature\User;

use App\Models\Feature\Grade;
use App\Models\Program\Program;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

#[\Livewire\Attributes\Title('Exam grade')]
class ExamGrade extends Component
{
    use WithPagination;

    public $search = '';

    public $selectedProgram = '';

    public $selectedLevel = '';

    public $selectedStudent = '';

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
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->whereHas('registration', function ($qr) {
                        $qr->where('student_name', 'like', '%'.$this->search.'%');
                    })
                        ->orWhereHas('registration.program', function ($qr) {
                            $qr->where('name', 'like', '%'.$this->search.'%');
                        });
                });
            })
            ->when($this->selectedProgram, function ($query) {
                $query->whereHas('registration', function ($qr) {
                    $qr->where('program_id', $this->selectedProgram);
                });
            })
            ->when($this->selectedLevel, function ($query) {
                $query->where('level_name', $this->selectedLevel);
            })
            ->orderBy('level_name', 'ASC')
            ->whereHas('registration.program', function ($query) {
                $query->where('is_visible', 1);
            })
            ->where('user_id', $userId)
            ->paginate(6);

        return $grades;
    }

    public function applyFilters()
    {
        $this->resetPage();
    }

    public function render()
    {
        SEOMeta::setTitle('My Exam Grades - IEC Denpasar');
        SEOMeta::setDescription('View and filter your exam grades, including program and level details.');
        SEOMeta::setCanonical(url()->current());

        OpenGraph::setTitle('My Exam Grades');
        OpenGraph::setDescription('View and filter your exam grades, including program and level details.');
        OpenGraph::setType('profile');
        OpenGraph::setUrl(url()->current());
        $programs = Program::select(['program_id', 'name'])->get();
        $data = [
            'grades' => $this->getExamGrade,
            'programs' => $programs,
        ];

        // dd($data);

        return view('livewire.feature.user.exam-grade', $data);
    }
}
