<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    /** @use HasFactory<\Database\Factories\Web\TestimonialFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'testimonials';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'position', 'testimony', 'image_path'];
}
