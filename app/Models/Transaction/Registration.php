<?php

namespace App\Models\Transaction;

use App\Models\Feature\Grade;
use App\Models\Program\Program;
use App\Models\Schedule\ClassSchedule;
use App\Models\User;
use App\Observers\RegistrationObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy(RegistrationObserver::class)]
class Registration extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'registrations';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

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
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'program_id');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class, 'registration_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'registration_id', 'id');
    }

    public function classSchedules()
    {
        return $this->belongsToMany(ClassSchedule::class, 'registration_schedules', 'registration_id', 'class_schedule_id');
    }
}
