<?php

namespace App\Models\feature;

use App\Models\Schedule\ClassSchedule;
use App\Models\Transaction\Registration;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationSchedule extends Model
{
    /** @use HasFactory<\Database\Factories\Feature\RegistrationScheduleFactory> */
    use HasFactory;

    protected $table = 'registration_schedules';

    protected $fillable = [
        'registration_id',
        'class_schedule_id',
    ];

    public $timestamps = true;

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }

    public function classSchedule()
    {
        return $this->belongsTo(ClassSchedule::class, 'class_schedule_id');
    }
}
