<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Tags\HasTags;

class Post extends Model
{
    use HasFactory;
    use HasTags;

    protected $table = 'blog_posts';

    protected $casts = [
        'published_at' => 'date',
    ];

    protected $fillable = [
        'title',
        'content',
        'image',
        'slug',
        'seo_title',
        'seo_description',
        'blog_author_id',
        'blog_category_id',
        'created_at',
        'updated_at',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'blog_author_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'blog_category_id');
    }

    public function team()
    {
        return $this->author->team();
    }
}
