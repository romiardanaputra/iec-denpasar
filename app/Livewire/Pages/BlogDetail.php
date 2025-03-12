<?php

namespace App\Livewire\Pages;

use App\Models\Blog\Post;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Component;

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
            ->with(['author.team', 'category'])
            ->firstOrFail();
    }

    public function render()
    {
        $post = $this->getBlog;

        // SEO Meta Tags
        SEOMeta::setTitle($post->title.' - Blog IEC Denpasar');
        SEOMeta::setDescription($post->meta_description ?? Str::limit(strip_tags($post->content), 160));
        SEOMeta::addMeta('article:published_time', $post->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $post->category->name, 'property');
        SEOMeta::addKeyword(array_merge(
            ['blog bahasa Inggris', 'IEC Denpasar'],
            explode(',', $post->tags ?? '')
        ));

        // OpenGraph Tags
        OpenGraph::setTitle($post->title);
        OpenGraph::setDescription($post->meta_description ?? Str::limit(strip_tags($post->content), 160));
        OpenGraph::setUrl(route('blog.detail', $post->slug)); // Sesuaikan dengan route name
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addImage(
            $post->image ?
            asset('storage/'.$post->image) :
            asset('images/default-blog-image.jpg'),
            ['height' => 630, 'width' => 1200]
        );

        // JSON-LD Schema
        JsonLd::setTitle($post->title);
        JsonLd::setDescription($post->meta_description ?? Str::limit(strip_tags($post->content), 160));
        JsonLd::setType('Article');
        JsonLd::addImage(
            $post->image ?
            asset('storage/'.$post->image) :
            asset('images/default-blog-image.jpg')
        );

        return view('livewire.pages.blog-detail', [
            'blog' => $post,
        ]);
    }
}
