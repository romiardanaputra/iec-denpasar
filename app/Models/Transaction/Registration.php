<?php

namespace App\Models\Transaction;

use App\Models\Program\Program;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'program_id',
        'student_name',
        'birthplace',
        'birthdate',
        'address',
        'education',
        'job',
        'market',
        'parent_guardian',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
