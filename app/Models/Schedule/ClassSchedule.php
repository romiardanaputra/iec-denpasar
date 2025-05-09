<?php

namespace App\Models\Schedule;

use App\Models\Program\Book;
use App\Models\Program\Program;
use App\Models\Team;
use App\Models\Transaction\Registration;
use App\Observers\ClassScheduleObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy(ClassScheduleObserver::class)]

class ClassSchedule extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'class_schedules';

    protected $primaryKey = 'class_schedule_id';

    public $increment = true;

    protected $keyType = 'int';

    public $timestamps = true;

    protected $guarded = ['class_schedule_id'];

    protected $fillable = [
        'program_id',
        'book_id',
        'time_code_id',
        'day_code_id',
        'team_id',
        'class_code',
        'slot',
        'slot_status',
    ];

    protected $casts = [
        'slot' => 'integer',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'program_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'book_id');
    }

    public function time()
    {
        return $this->belongsTo(ClassTimeCode::class, 'time_code_id', 'time_code_id');
    }

    public function day()
    {
        return $this->belongsTo(ClassDayCode::class, 'day_code_id', 'day_code_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id', 'team_id');
    }

    // ?
    public function registrations()
    {
        return $this->belongsToMany(Registration::class, 'registration_schedules', 'class_schedule_id', 'registration_id');
    }

    public function getTotalRegistrationsAttribute()
    {
        return $this->registrations()->count();
    }

    public function hasAvailableSlots()
    {
        return $this->total_registrations < $this->slot;
    }

    public function updateSlotStatus()
    {
        $used = $this->registrations()->count();
        $this->slot_status = $used >= $this->slot ? 'full' : 'available';
        $this->saveQuietly();
    }
}
