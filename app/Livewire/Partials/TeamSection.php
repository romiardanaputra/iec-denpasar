<?php

namespace App\Livewire\Partials;

use App\Models\Team;
use Livewire\Component;

class TeamSection extends Component
{
    public function render()
    {
        $teams = Team::get();
        $data = [
            'teams' => $teams,
        ];

        return view('livewire.partials.team-section', $data);
    }
}
