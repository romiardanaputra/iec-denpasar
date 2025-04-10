<?php

namespace App\Models\Program;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'program_details';

    protected $primaryKey = 'id';

    protected $casts = [
        'benefits' => 'array',
    ];

    protected $fillable = [
        'program_id',
        'long_description',
        'level',
        'benefits',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'program_id');
    }
}
