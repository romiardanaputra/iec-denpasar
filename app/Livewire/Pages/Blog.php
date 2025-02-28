<?php

namespace App\Livewire\Pages;

use App\Models\Blog\Author;
use App\Models\Blog\Category;
use App\Models\Blog\Link;
use App\Models\Blog\Post;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

#[\Livewire\Attributes\Title('Blog')]
class Blog extends Component
{
    use WithPagination;

    public $search = '';

    public $selectedCategory = null;

    public $selectedAuthor = null;

    protected $queryString = ['search', 'selectedCategory', 'selectedAuthor'];

    #[Computed]
    public function getBlog()
    {
        return $this->baseBlogQuery()->paginate(10);
    }

    #[Computed]
    public function getPostLinks()
    {
        return Link::get();
    }

    #[Computed]
    public function getRecommendedBlogs()
    {
        return $this->baseBlogQuery()->limit(4)->get();
    }

    #[Computed]
    public function getCategories()
    {
        return Category::where('is_visible', 1)->get();
    }

    public function performSearch()
    {
        $this->resetPage();
    }

    #[Computed]
    public function getAuthors()
    {
        return Author::with('team')->get()->mapWithKeys(function ($author) {
            return [$author->id => $author->team?->name ?? 'No Team'];
        });
    }

    private function baseBlogQuery()
    {
        return Post::with(['author.team', 'category'])
            ->when($this->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', '%'.$search.'%')
                        ->orWhere('content', 'like', '%'.$search.'%')
                        ->orWhereHas('category', function ($cq) use ($search) {
                            $cq->where('name', 'like', '%'.$search.'%');
                        })
                        ->orWhereHas('author.team', function ($aq) use ($search) {
                            $aq->where('name', 'like', '%'.$search.'%');
                        });
                });
            })
            ->when($this->selectedCategory, function ($query, $categoryId) {
                $query->where('blog_category_id', $categoryId);
            })
            ->when($this->selectedAuthor, function ($query, $authorId) {
                $query->where('blog_author_id', $authorId);
            })
            ->whereHas('category', function ($query) {
                $query->where('is_visible', 1);
            })
            ->orderBy('created_at', 'desc');
    }

    public function render()
    {
        $data = [
            'blogs' => $this->getBlog,
            'links' => $this->getPostLinks,
            'recommendedBlogs' => $this->getRecommendedBlogs,
            'categories' => $this->getCategories,
            'authors' => $this->getAuthors,
        ];
        // dd($data['blogs']);

        return view('livewire.pages.blog', $data);
    }
}
