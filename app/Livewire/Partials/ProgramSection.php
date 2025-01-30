<?php

namespace App\Livewire\Partials;

use App\Models\Team;
use Livewire\Component;

class ProgramSection extends Component
{
    public $cards;

    public function mount()
    {
        $this->cards = [
            (object) [
                'img' => 'kid-school.jpg',
                'title' => 'English For Children',
                'short_description' => 'Fun and interactive lessons to help children learn English through games and activities.',
            ],
            (object) [
                'img' => 'middle-school.jpg',
                'title' => 'English For Junior',
                'short_description' => 'Engaging stories and songs to make learning English enjoyable for kids.',
            ],
            (object) [
                'img' => 'kid-school.jpg',
                'title' => 'General English',
                'short_description' => 'Creative writing exercises to boost children\'s English language skills.',
            ],
            (object) [
                'img' => 'middle-school.jpg',
                'title' => 'TOEFL/TOEIC Program',
                'short_description' => 'Interactive quizzes and puzzles to reinforce English vocabulary and grammar.',
            ],
        ];
    }

    public function render()
    {
        $teams = Team::select(['name', 'short_description', 'image', 'linkedin', 'facebook', 'instagram', 'whatsapp'])->get();
        $data = [
            'teams' => $teams,
        ];

        return view('livewire.partials.program-section', $data);
    }
}
