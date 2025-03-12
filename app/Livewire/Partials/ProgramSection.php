<?php

namespace App\Livewire\Partials;

use App\Models\Program\Program;
use Livewire\Component;

class ProgramSection extends Component
{
    public $cards;

    public $slug;

    public function render()
    {
        $programs = Program::get();
        $data = [
            'programs' => $programs,
        ];

        return view('livewire.partials.program-section', $data);
    }
}
