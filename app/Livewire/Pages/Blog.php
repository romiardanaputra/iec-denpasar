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
        $blogs = Post::with(['author', 'category'])
            ->when($this->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', '%'.$search.'%')
                        ->orWhere('content', 'like', '%'.$search.'%')
                        ->orWhereHas('category', function ($cq) use ($search) {
                            $cq->where('name', 'like', '%'.$search.'%');
                        })
                        ->orWhereHas('author', function ($aq) use ($search) {
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
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return $blogs;
    }

    #[Computed]
    public function getPostLinks()
    {
        $links = Link::get();

        return $links;
    }

    #[Computed]
    public function getRecommendedBlogs()
    {
        $recommendedBlogs = Post::with(['author', 'category'])
            ->when($this->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', '%'.$search.'%')
                        ->orWhere('content', 'like', '%'.$search.'%')
                        ->orWhereHas('category', function ($cq) use ($search) {
                            $cq->where('name', 'like', '%'.$search.'%');
                        })
                        ->orWhereHas('author', function ($aq) use ($search) {
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
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        return $recommendedBlogs;
    }

    #[Computed]
    public function getCategories()
    {
        return Category::where('is_visible', 1)->get();
    }

    #[Computed]
    public function getAuthors()
    {
        return Author::get();
    }

    public function performSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $data = [
            'blogs' => $this->getBlog(),
            'links' => $this->getPostLinks(),
            'recommendedBlogs' => $this->getRecommendedBlogs(),
            'categories' => $this->getCategories(),
            'authors' => $this->getAuthors(),
        ];

        return view('livewire.pages.blog', $data);
    }
}
