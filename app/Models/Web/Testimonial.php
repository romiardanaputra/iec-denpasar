<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    /** @use HasFactory<\Database\Factories\Web\TestimonialFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'testimonials';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    protected $fillable = ['name', 'position', 'testimony', 'image_path'];
}
