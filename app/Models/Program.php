<?php

namespace App\Models;

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
}
