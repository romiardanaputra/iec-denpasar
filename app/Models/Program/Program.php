<?php

namespace App\Models\Program;

use App\Models\Schedule\ClassSchedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'program_id';

    protected $table = 'programs';

    protected $guarded = ['program_id'];

    protected $cast = [
        'is_visible' => 'boolean',
        'published_at' => 'date',
    ];

    protected $fillable = [
        'image',
        'name',
        'slug',
        'short_description',
        'rate',
        'price',
        'register_fee',
    ];

    public function classes()
    {
        return $this->hasMany(ClassSchedule::class, 'program_id', 'program_id');
    }

    public function detail()
    {
        return $this->hasOne(ProgramDetail::class, 'program_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'program_id');
    }

    public function books()
    {
        return $this->hasMany(Book::class, 'program_id');
    }
}
