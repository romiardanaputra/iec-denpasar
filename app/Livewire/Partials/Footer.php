<?php

namespace App\Livewire\Partials;

use App\Models\Program\Program;
use Livewire\Component;

class Footer extends Component
{
    public $programs = [];

    public $quickNavs = [];

    public $contacts = [];

    public function mount()
    {
        $this->programs = Program::select(['name', 'slug'])->get();

        if (auth()->check() && auth()->user()->hasVerifiedEmail()) {
            $this->quickNavs = [
                (object) ['name' => 'Blog', 'route' => route('blog')],
                (object) ['name' => 'Tentang Kami', 'route' => route('about')],
                (object) ['name' => 'Kontak', 'route' => route('contact')],
                (object) ['name' => 'Program Kami', 'route' => route('our-program')],
            ];
        } else {
            $this->quickNavs = [
                (object) ['name' => 'Daftar Akun', 'route' => route('register')],
                (object) ['name' => 'Login', 'route' => route('login')],
                (object) ['name' => 'Kontak', 'route' => route('contact')],
                (object) ['name' => 'Program Kami', 'route' => route('our-program')],
            ];
        }
        $this->contacts = [
            (object) ['name' => 'Contact', 'value' => '085792479249', 'redirect' => 'https://wa.me/+6285792479249'],
            (object) ['name' => 'Address', 'value' => 'Jl. Jaya Giri Gg. XXII No.10x, Renon, Kec. Denpasar Tim., Kota Denpasar, Bali 80236', 'redirect' => 'https://maps.app.goo.gl/PULYrDfM2u6KW4BV6'],
            (object) ['name' => 'WhatsApp', 'value' => '39284329832', 'redirect' => 'https://wa.me/+6285792479249'],
            (object) ['name' => 'Email', 'value' => 'iecdps@gmail.com', 'redirect' => 'https://mailto:romiardana21@gmail.com'],
        ];
    }

    public function render()
    {
        return view('livewire.partials.footer');
    }
}
