<?php

namespace App\Models\Transaction;

use App\Models\Feature\Grade;
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
        // 'order_id',
        'student_name',
        'birthplace',
        'birthdate',
        'address',
        'education',
        'job',
        'market',
        'parent_guardian',
        'is_active',
    ];

    protected $cast = [
        'is_visible' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
