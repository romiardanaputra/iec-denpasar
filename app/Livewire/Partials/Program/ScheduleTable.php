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

    public $sortBy = 'class_code'; // Default sort by class code

    public $sortDirection = 'asc'; // Default sort direction

    public $perPage = 5;

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

    public function updatingFilterDay()
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

        return view('livewire.partials.program.schedule-table', [
            'classes' => $classes,
            'days' => ClassDayCode::get(),
            'times' => ClassTimeCode::get(),
        ]);
    }
}
