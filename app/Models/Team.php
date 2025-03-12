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

    protected $cast = [
        'is_active' => 'boolean',
        'join_at' => 'datetime',
    ];

    public function classes()
    {
        return $this->hasMany(ClassSchedule::class);
    }

    public function author()
    {
        return $this->hasOne(Author::class);
    }
}
