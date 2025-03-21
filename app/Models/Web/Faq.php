<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    /** @use HasFactory<\Database\Factories\Web\FaqFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'faqs';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    protected $fillable = [
        'question',
        'answer',
    ];
}
