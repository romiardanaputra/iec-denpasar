<?php

namespace App\Livewire\Partials;

use App\Models\Program\Program;
use App\Models\Team;
use Livewire\Component;

class ProgramSection extends Component
{
    public $cards;

    public $slug;

    public function render()
    {
        $teams = Team::select(['name', 'short_description', 'image', 'linkedin', 'facebook', 'instagram', 'whatsapp'])
            ->get();
        $programs = Program::get();
        $data = [
            'teams' => $teams,
            'programs' => $programs,
        ];

        return view('livewire.partials.program-section', $data);
    }
}
