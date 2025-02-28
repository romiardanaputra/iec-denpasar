<?php

namespace App\Models\Program;

use App\Models\Schedule\ClassSchedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $primaryKey = 'book_id';

    protected $guarded = ['book_id'];

    protected $fillable = [
        'book_price',
        'level',
        'book_name',
        'book_code',
    ];

    public function classes()
    {
        return $this->hasMany(ClassSchedule::class, 'book_id');
    }
}
