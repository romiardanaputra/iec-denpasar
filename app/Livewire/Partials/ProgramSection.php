<?php

namespace App\Livewire\Partials;

use Livewire\Component;

class ProgramSection extends Component
{
    public $cards;

    public function mount()
    {
        $this->cards = [
            (object) [
                'img' => 'classic-lms-01.jpg',
                'title' => 'English For Children',
                'short_description' => 'Fun and interactive lessons to help children learn English through games and activities.',
            ],
            (object) [
                'img' => 'classic-lms-02.jpg',
                'title' => 'English For Junior',
                'short_description' => 'Engaging stories and songs to make learning English enjoyable for kids.',
            ],
            (object) [
                'img' => 'classic-lms-03.jpg',
                'title' => 'General English',
                'short_description' => 'Creative writing exercises to boost children\'s English language skills.',
            ],
            (object) [
                'img' => 'course-online-02.jpg',
                'title' => 'TOEFL/TOEIC Program',
                'short_description' => 'Interactive quizzes and puzzles to reinforce English vocabulary and grammar.',
            ],
            (object) [
                'img' => 'course-online-03.jpg',
                'title' => 'Conversation Practice',
                'short_description' => 'Live online classes with experienced teachers to guide children in learning English.',
            ],
            (object) [
                'img' => 'course-online-06.jpg',
                'title' => 'Grammar Class',
                'short_description' => 'A variety of multimedia resources to support children\'s English learning journey.',
            ],
            (object) [
                'img' => 'course-online-06.jpg',
                'title' => 'Grammar Class',
                'short_description' => 'A variety of multimedia resources to support children\'s English learning journey.',
            ],
            (object) [
                'img' => 'course-online-06.jpg',
                'title' => 'Grammar Class',
                'short_description' => 'A variety of multimedia resources to support children\'s English learning journey.',
            ],
        ];
    }

    public function render()
    {
        return view('livewire.partials.program-section');
    }
}
