<?php

namespace App\Livewire\Pages;

use App\Models\Blog\Author;
use App\Models\Blog\Category;
use App\Models\Blog\Link;
use App\Models\Blog\Post;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
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
        return $this->baseBlogQuery()->paginate(6);
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
        // SEO Meta Tags
        SEOMeta::setTitle('Blog IEC Denpasar | Tips dan Artikel Bahasa Inggris Terbaru');
        SEOMeta::setDescription('Dapatkan tips belajar bahasa Inggris terkini, artikel edukasi, dan informasi kursus dari IEC Denpasar. Blog resmi untuk meningkatkan kemampuan bahasa Inggris Anda.');
        SEOMeta::addMeta('article:published_time', now()->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', 'Pendidikan & Bahasa', 'property');
        SEOMeta::addKeyword([
            'blog bahasa Inggris',
            'tips belajar Inggris',
            'artikel pendidikan',
            'IEC Denpasar blog',
            'kursus bahasa Inggris di Bali',
        ]);

        // OpenGraph Tags
        OpenGraph::setDescription('Dapatkan tips belajar bahasa Inggris terkini, artikel edukasi, dan informasi kursus dari IEC Denpasar');
        OpenGraph::setTitle('Blog IEC Denpasar | Tips dan Artikel Bahasa Inggris Terbaru');
        OpenGraph::setUrl('https://iecdenpasar.com/blog'); // Sesuaikan URL
        OpenGraph::addProperty('type', 'blog');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['en_US', 'id_ID']);

        // Gunakan gambar khusus untuk blog
        OpenGraph::addImage('https://www.iecdenpasar.com/public/favicon.ico', [
            'height' => 630,
            'width' => 1200,
        ]);

        // JSON-LD Schema
        JsonLd::setTitle('Blog IEC Denpasar | Tips dan Artikel Bahasa Inggris Terbaru');
        JsonLd::setDescription('Dapatkan tips belajar bahasa Inggris terkini, artikel edukasi, dan informasi kursus dari IEC Denpasar');
        JsonLd::setType('Blog');
        JsonLd::addImage('https://www.iecdenpasar.com/public/favicon.ico');
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
