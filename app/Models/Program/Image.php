<?php

namespace App\Models\Program;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'images';

    protected $fillable = [
        'program_id',
        'path',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
