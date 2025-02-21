<?php

namespace App\Livewire\Pages;

use App\Models\Blog\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Blog Detail')]
class BlogDetail extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    #[Computed]
    public function getBlog()
    {
        return Post::where('slug', $this->slug)
            ->with(['author', 'category'])
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.pages.blog-detail', [
            'blog' => $this->getBlog,
        ]);
    }
}
