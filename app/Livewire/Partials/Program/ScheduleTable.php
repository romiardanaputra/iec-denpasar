<?php

namespace App\Livewire\Partials\Program;

use App\Models\Schedule\ClassDayCode;
use App\Models\Schedule\ClassTimeCode;
use Livewire\Component;
use Livewire\WithPagination;

class ScheduleTable extends Component
{
    use WithPagination;

    public $program;

    public $search = '';

    public $filterDay = '';

    public $filterTime = '';

    public $filterStatus = '';

    public $selectedSchedules = [];

    public $sortBy = 'class_code';

    public $sortDirection = 'asc';

    public $perPage = 5;

    protected $listeners = ['resetSelection' => 'resetSelectedSchedules'];

    public function resetSelectedSchedules()
    {
        $this->selectedSchedules = [];
    }

    public function toggleSchedule($class_schedule_id)
    {
        if (in_array($class_schedule_id, $this->selectedSchedules)) {
            $this->selectedSchedules = array_diff($this->selectedSchedules, [$class_schedule_id]);
        } else {
            $this->selectedSchedules[] = $class_schedule_id;
        }
    }

    public function goToCheckout()
    {
        if (count($this->selectedSchedules) !== 2) {
            session()->flash('error', 'Pilih 2 jadwal kursus, kursus akan dilaksanakan 1 minggu 2 kali.');

            return;
        }

        return to_route('checkout', ['schedule' => $this->selectedSchedules, 'program' => $this->program->program_id]);
    }

    public function redirectLogin()
    {
        return redirect()->route('login');
    }

    protected $queryString = [
        'search' => ['except' => ''],
        'filterDay' => ['except' => ''],
        'filterTime' => ['except' => ''],
        'filterStatus' => ['except' => ''],
        'sortBy' => ['except' => 'class_code'],
        'sortDirection' => ['except' => 'asc'],
    ];

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

    public function render()
    {

        $classes = $this->program->classes()
            ->when($this->search, function ($query, $search) {
                return $query->where('class_code', 'like', '%'.$search.'%')
                    ->orWhereHas('program', function ($query) use ($search) {
                        $query->where('name', 'like', '%'.$search.'%');
                    })
                    ->orWhereHas('book', function ($query) use ($search) {
                        $query->where('book_name', 'like', '%'.$search.'%');
                    })
                    ->orWhereHas('day', function ($query) use ($search) {
                        $query->where('day_name', 'like', '%'.$search.'%');
                    });
            })
            ->when($this->filterDay, function ($query) {
                return $query->whereHas('day', function ($query) {
                    $query->where('day_name', $this->filterDay);
                });
            })
            ->when($this->filterTime, function ($query) {
                return $query->whereHas('time', function ($query) {
                    $query->where('time_start', '<=', $this->filterTime)
                        ->where('time_end', '>=', $this->filterTime);
                });
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        $data = [
            'classes' => $classes,
            'days' => ClassDayCode::get(),
            'times' => ClassTimeCode::get(),
        ];

        return view('livewire.partials.program.schedule-table', $data);
    }
}
