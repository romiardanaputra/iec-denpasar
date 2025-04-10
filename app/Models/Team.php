<?php

namespace App\Models;

use App\Models\Blog\Author;
use App\Models\Schedule\ClassSchedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'teams';

    protected $primaryKey = 'team_id';

    protected $guarded = ['team_id'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $fillable = [
        'name',
        'slug',
        'age',
        'gender',
        'short_description',
        'image',
        'linkedin',
        'facebook',
        'instagram',
        'whatsapp',
        'is_active',
    ];

    public function classes()
    {
        return $this->hasMany(ClassSchedule::class, 'team_id', 'team_id');
    }

    public function author()
    {
        return $this->hasOne(Author::class, 'team_id', 'team_id');
    }
}
