<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    /** @use HasFactory<\Database\Factories\Web\FaqFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'faqs';

    protected $primaryKey = 'id';

    protected $fillable = [
        'question',
        'answer',
    ];
}
