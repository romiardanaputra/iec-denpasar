<?php

namespace App\Models\Feature;

use App\Models\Schedule\ClassSchedule;
use App\Models\Transaction\Registration;
use App\Observers\RegistrationScheduleObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy(RegistrationScheduleObserver::class)]
class RegistrationSchedule extends Model
{
    /** @use HasFactory<\Database\Factories\Feature\RegistrationScheduleFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'registration_schedules';

    protected $fillable = [
        'registration_id',
        'class_schedule_id',
    ];

    public $timestamps = true;

    public function registration()
    {
        return $this->belongsTo(Registration::class, 'registration_id', 'id');
    }

    public function classSchedule()
    {
        return $this->belongsTo(ClassSchedule::class, 'class_schedule_id', 'class_schedule_id');
    }
}
