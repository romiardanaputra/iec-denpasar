<?php

namespace App\Models\Program;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'program_details';

    protected $fillable = [
        'program_id',
        'long_description',
        'level',
        'benefits',
    ];

    protected $casts = [
        'benefits' => 'array', // Pastikan benefits disimpan sebagai array
    ];

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
