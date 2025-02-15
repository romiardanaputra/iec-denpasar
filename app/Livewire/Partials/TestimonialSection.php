<?php

namespace App\Livewire\Partials;

use App\Models\Web\Testimonial;
use Livewire\Component;

class TestimonialSection extends Component
{
    public $testimonials;

    public function mount()
    {
        $this->testimonials = Testimonial::get();
    }

    public function render()
    {
        $data = [
            'testimonials' => $this->testimonials,
        ];

        return view('livewire.partials.testimonial-section', $data);
    }
}
