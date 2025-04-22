<?php

namespace App\Livewire\Feature\User;

use App\Models\Feature\RegistrationSchedule;
use App\Models\Transaction\Order;
use App\Models\Transaction\Registration;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

#[\Livewire\Attributes\Title('Dashboard')]
class Dashboard extends Component
{
    public $user;

    public $students;

    public $schedules;

    public $programs;

    public function mount()
    {
        $authUser = auth()->user();
        $cacheKey = "iecdenpasar:dashboard:user:{$authUser->id}:student";
        $cacheTime = now()->addMinutes(15);
        $cacheCallback = function () {
            return Registration::where('user_id', auth()->id())
                ->orderByDesc('id')
                ->get();
        };

        if ($authUser && $authUser->hasVerifiedEmail()) {
            $this->user = $authUser;
            $this->students = Cache::remember($cacheKey, $cacheTime, $cacheCallback);
            $this->fetchSchedules();
            $this->fetchPrograms();
        } else {
            abort(404);
        }
    }

    public function getOrder()
    {
        if (auth()->check() && auth()->user()->hasVerifiedEmail()) {
            return Order::with(['program'])
                ->where('user_id', auth()->user()->id)
                ->orderByDesc('id')
                ->where('payment_status', 'unpaid')
                ->get();
        }

        return null;
    }

    public function fetchSchedules()
    {
        $authId = auth()->user()->id;
        $cacheKey = "iecdenpasar:dashboard:user:{$authId}:schedule";
        $cacheTime = now()->addMinutes(15);
        $cacheCallback = function () {
            return RegistrationSchedule::with(['registration', 'classSchedule'])
                ->whereHas('registration', function ($query) {
                    $query->where('user_id', auth()->id());
                })
                ->get();
        };

        $this->schedules = Cache::remember($cacheKey, $cacheTime, $cacheCallback);
    }

    public function fetchPrograms()
    {
        $authId = auth()->user()->id;
        // $programIds = Registration::where('user_id', $authId)->pluck('id')->implode(':');
        $cacheKey = "iecdenpasar:dashboard:user:{$authId}:program";
        $cacheTime = now()->addMinutes(15);
        $cacheCallback = function () {
            return Registration::where('user_id', auth()->id())
                ->with('program')
                ->get()
                ->groupBy('program.name')
                ->map(function ($registrations, $programName) {
                    return [
                        'name' => $programName,
                        'count' => $registrations->count(),
                    ];
                })
                ->values();
        };
        $this->programs = Cache::remember($cacheKey, $cacheTime, $cacheCallback);

    }

    public function redirectToProgram()
    {
        $this->redirectRoute('our-program');
    }

    public function redirectToBill()
    {
        $this->redirectRoute('bill');
    }

    public function redirectToGrade()
    {
        $this->redirectRoute('exam-grade');
    }

    public function redirectToProfile()
    {
        $this->redirectRoute('profile');
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
            'orders' => $this->getOrder(),
            'schedules' => $this->schedules,
            'students' => $this->students,
            'programs' => $this->programs,
        ];

        return view('livewire.feature.user.dashboard', $data);
    }
}
