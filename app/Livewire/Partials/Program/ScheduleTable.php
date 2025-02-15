<?php

namespace App\Livewire\Partials\Program;

use Livewire\Component;
use Livewire\WithPagination;

class ScheduleTable extends Component
{
    use WithPagination;

    public $program;

    public $search = '';

    public $perPage = 10;

    protected $queryString = ['search' => ['except' => '']];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if (! $this->program) {
            return view('livewire.partials.program.schedule-table', ['classes' => []]);
        }

        $classes = $this->program->classes()
            ->when($this->search, function ($query, $search) {
                return $query->whereHas('program', function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                })
                    ->orWhereHas('book', function ($query) use ($search) {
                        $query->where('book_name', 'like', '%'.$search.'%');
                    })
                    ->orWhereHas('day', function ($query) use ($search) {
                        $query->where('day_name', 'like', '%'.$search.'%');
                    })
                    ->orWhere('class_code', 'like', '%'.$search.'%');
            })
            ->paginate($this->perPage);

        return view('livewire.partials.program.schedule-table', ['classes' => $classes]);
    }
}
