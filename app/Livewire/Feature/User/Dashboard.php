<?php

namespace App\Livewire\Feature\User;

use App\Models\Feature\RegistrationSchedule;
use App\Models\Transaction\Order;
use App\Models\Transaction\Registration;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Computed;
use Livewire\Component;

#[\Livewire\Attributes\Title('Dashboard')]
class Dashboard extends Component
{
    public $user;

    public $selectedStudentName;

    public $students;

    public $schedules;

    public $programs;

    public function mount()
    {
        $authUser = auth()->user();
        if ($authUser && $authUser->hasVerifiedEmail()) {
            $this->user = $authUser;

            // Cache students list
            $this->students = Cache::remember('user_students_'.auth()->user()->id, now()->addMinutes(15), function () {
                return Registration::where('user_id', auth()->id())->get();
            });

            // Set default selected student name if needed
            if ($this->students->isNotEmpty()) {
                $this->selectedStudentName = $this->students->first()->student_name;
            } else {
                $this->selectedStudentName = null;
            }

            // Fetch schedules and programs for the default selected student
            $this->fetchSchedules();
            $this->fetchPrograms();
        } else {
            abort(404);
        }
    }

    #[Computed]
    public function getOrder()
    {
        if (auth()->check() && auth()->user()->hasVerifiedEmail()) {
            return Cache::remember('user_order_'.auth()->user()->id, now()->addMinutes(15), function () {
                return Order::with(['program'])->where('user_id', auth()->user()->id)->first();
            });
        }

        return null;
    }

    public function fetchSchedules()
    {
        if ($this->selectedStudentName) {
            $this->schedules = Cache::remember('user_schedules_'.auth()->user()->id.'_'.$this->selectedStudentName, now()->addMinutes(15), function () {
                return RegistrationSchedule::with(['registration', 'classSchedule'])
                    ->whereHas('registration', function ($query) {
                        $query->where('user_id', auth()->id());
                        $query->where('student_name', $this->selectedStudentName);
                    })
                    ->get();
            });
        } else {
            $this->schedules = collect([]); // Ensure schedules is an empty collection
        }
    }

    public function fetchPrograms()
    {
        if ($this->selectedStudentName) {
            $this->programs = Cache::remember('user_programs_'.auth()->user()->id.'_'.$this->selectedStudentName, now()->addMinutes(15), function () {
                return Registration::where('user_id', auth()->id())
                    ->where('student_name', $this->selectedStudentName)
                    ->with('program')
                    ->get()
                    ->pluck('program.name')
                    ->unique()
                    ->values();
            });
        } else {
            $this->programs = collect([]); // Ensure programs is an empty collection
        }
    }

    public function selectStudent($studentName)
    {
        $this->selectedStudentName = $studentName;
        $this->fetchSchedules();
        $this->fetchPrograms();
    }

    public function redirectToProgram()
    {
        return redirect()->route('our-program');
    }

    public function redirectToBill()
    {
        $this->redirectRoute('bill');
    }

    public function redirectToGrade()
    {
        $this->redirectRoute('grade');
    }

    public function render()
    {
        SEOMeta::setTitle('My Dashboard - IEC Denpasar');
        SEOMeta::setDescription('dashboard student of iec denpasar');
        SEOMeta::setCanonical(url()->current());

        OpenGraph::setTitle('My Dashboard - IEC Denpasar');
        OpenGraph::setDescription('dashboard student of iec denpasar');
        OpenGraph::setType('dashboard');
        OpenGraph::setUrl(url()->current());
        $data = [
            'order' => $this->getOrder(),
            'schedules' => $this->schedules,
            'students' => $this->students,
            'programs' => $this->programs,
        ];

        return view('livewire.feature.user.dashboard', $data);
    }
}
