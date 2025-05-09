<?php

namespace App\Livewire\Partials\Program;

use App\Models\Schedule\ClassDayCode;
use App\Models\Schedule\ClassSchedule;
use App\Models\Schedule\ClassTimeCode;
use Livewire\Component;
use Livewire\WithPagination;

class ScheduleTable extends Component
{
    use WithPagination;

    // === Properties ===
    public $program;

    public $search = '';

    public $filterDay = '';

    public $filterTime = '';

    public $filterStatus = '';

    public $selectedSchedules = [];

    public $sortBy = 'class_code';

    public $sortDirection = 'asc';

    public $perPage = 5;

    public $showFullModal = false;

    public $fullScheduleDetails = null;

    // === Listeners ===
    protected $listeners = ['resetSelection' => 'resetSelectedSchedules'];

    // === Query String Binding ===
    protected $queryString = [
        'search' => ['except' => ''],
        'filterDay' => ['except' => ''],
        'filterTime' => ['except' => ''],
        'filterStatus' => ['except' => ''],
        'sortBy' => ['except' => 'class_code'],
        'sortDirection' => ['except' => 'asc'],
    ];

    // === Event Handlers ===
    public function resetSelectedSchedules()
    {
        $this->selectedSchedules = [];
    }

    public function toggleSchedule($classScheduleId)
    {
        $schedule = ClassSchedule::findOrFail($classScheduleId);

        if ($schedule->slot_status === 'full') {
            $this->dispatch('show.full.modal');

            return;
        }

        if (! in_array($classScheduleId, $this->selectedSchedules)) {
            $this->selectedSchedules[] = $classScheduleId;
        } else {
            $this->selectedSchedules = array_filter(
                $this->selectedSchedules,
                fn ($id) => $id != $classScheduleId
            );
        }
    }

    public function goToCheckout()
    {
        if (count($this->selectedSchedules) !== 2) {
            session()->flash('error', 'Pilih 2 jadwal kursus, kursus akan dilaksanakan 1 minggu 2 kali.');

            return;
        }

        foreach ($this->selectedSchedules as $scheduleId) {
            $schedule = ClassSchedule::find($scheduleId);
            if ($schedule && $schedule->slot_status === 'full') {
                $this->fullScheduleDetails = [
                    'program' => $schedule->program->name,
                    'class_code' => $schedule->class_code,
                    'day' => optional($schedule->day)->day_name,
                    'time' => optional($schedule->time)->formatted_time,
                    'mentor' => optional($schedule->mentor)->name ?? 'Belum ditentukan',
                ];
                $this->showFullModal = true;

                return;
            }
        }

        return to_route('checkout', [
            'schedule' => $this->selectedSchedules,
            'program' => $this->program->program_id,
        ]);
    }

    public function closeModal()
    {
        $this->showFullModal = false;
    }

    public function redirectLogin()
    {
        return redirect()->route('login');
    }

    // === Search & Filter Handling ===
    public function performSearch()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterDay(): void
    {
        $this->resetPage();
    }

    public function updatingFilterTime()
    {
        $this->resetPage();
    }

    // === Render Method ===
    public function render()
    {
        $classes = $this->getQuery()->paginate($this->perPage);

        return view('livewire.partials.program.schedule-table', [
            'classes' => $classes,
            'days' => ClassDayCode::get(),
            'times' => ClassTimeCode::get(),
        ]);
    }

    // === Private Helpers ===
    private function getQuery()
    {
        return $this->program->classes()
            ->when($this->search, function ($query, $search) {
                return $query->where('class_code', 'like', "%{$search}%")
                    ->orWhereHas('program', fn ($q) => $q->where('name', 'like', "%{$search}%"))
                    ->orWhereHas('book', fn ($q) => $q->where('book_name', 'like', "%{$search}%"))
                    ->orWhereHas('day', fn ($q) => $q->where('day_name', 'like', "%{$search}%"));
            })
            ->when($this->filterDay, function ($query) {
                return $query->whereHas('day', fn ($q) => $q->where('day_name', $this->filterDay));
            })
            ->when($this->filterTime, function ($query) {
                return $query->whereHas(
                    'time',
                    fn ($q) => $q->where('time_start', '<=', $this->filterTime)
                        ->where('time_end', '>=', $this->filterTime)
                );
            })
            ->orderBy($this->sortBy, $this->sortDirection);
    }
}
