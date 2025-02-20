<?php

namespace App\Livewire\Partials;

use App\Models\Web\Faq;
use Livewire\Component;

class FaqSection extends Component
{
    public $faqs;

    public function mount()
    {
        $this->faqs = Faq::get();
    }

    public function render()
    {
        $data = [
            'faqs' => $this->faqs,
        ];

        return view('livewire.partials.faq-section', $data);
    }
}
