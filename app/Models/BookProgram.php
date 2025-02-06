<?php

namespace App\Models;

use App\Models\Schedule\ClassSchedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookProgram extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $primaryKey = 'book_id';

    protected $guarded = ['book_id'];

    public function classes()
    {
        return $this->hasMany(ClassSchedule::class);
    }
}
