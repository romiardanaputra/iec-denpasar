<?php

namespace App\Models\Blog;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;

    protected $table = 'blog_authors';

    protected $fillable = [
        'team_id',
        'email',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'blog_author_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
