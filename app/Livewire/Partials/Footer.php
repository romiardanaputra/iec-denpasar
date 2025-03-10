<?php

namespace App\Livewire\Partials;

use App\Models\Program\Program;
use Livewire\Component;

class Footer extends Component
{
    public $programs = [];

    public $iecNavs = [];

    public $supports = [];

    public $resources = [];

    public function mount()
    {
        $this->programs = Program::select(['name', 'slug'])->get();

        if ($this->programs->isEmpty()) {
            $this->programs = [
                (object) ['name' => 'English for kid', 'slug' => 'english-for-kid'],
                (object) ['name' => 'English for children', 'slug' => 'english-for-children'],
                (object) ['name' => 'English for junior', 'slug' => 'english-for-junior'],
                (object) ['name' => 'General english', 'slug' => 'general-english'],
            ];
        }

        if (auth()->check() && auth()->user()->hasVerifiedEmail()) {
            $this->resources = [
                (object) ['name' => 'Dashboard', 'route' => route('dashboard')],
                (object) ['name' => 'Profile', 'route' => route('profile')],
                (object) ['name' => 'Nilai Siswa', 'route' => route('exam-grade')],
                (object) ['name' => 'Tagihan', 'route' => route('bill')],
                (object) ['name' => 'Blog', 'route' => route('blog')],
            ];
        } else {
            $this->resources = [
                (object) ['name' => 'Daftar Akun', 'route' => route('register')],
                (object) ['name' => 'Login', 'route' => route('login')],
                (object) ['name' => 'Program Kami', 'route' => route('our-program')],
                (object) ['name' => 'FAQs', 'route' => route('about')],
                (object) ['name' => 'Team', 'route' => route('our-team')],
            ];
        }

        $this->iecNavs = [
            (object) ['name' => 'Beranda', 'route' => route('landing')],
            (object) ['name' => 'Tentang', 'route' => route('about')],
            (object) ['name' => 'Program', 'route' => route('our-program')],
            (object) ['name' => 'Team', 'route' => route('our-team')],
            (object) ['name' => 'Blog', 'route' => route('blog')],
        ];

        $this->supports = [
            (object) ['name' => 'Whatsapp', 'value' => '0874715370', 'redirect' => 'https://wa.me/+62874715370'],
            (object) ['name' => 'Lokasi', 'value' => 'Jl. Jaya Giri Gg. XXII No.10x, Renon, Kec. Denpasar Tim., Kota Denpasar, Bali 80236', 'redirect' => 'https://maps.app.goo.gl/PULYrDfM2u6KW4BV6'],
            (object) ['name' => 'Email', 'value' => 'iecdps@gmail.com', 'redirect' => 'https://mailto:iecdps@gmail.com'],
            // (object) ['name' => 'Term and Condition', 'value' => route('term-and-condition')],
            // (object) ['name' => 'Privacy Policy', 'value' => route('privacy-policy')]
        ];
    }

    public function render()
    {
        return view('livewire.partials.footer');
    }
}
