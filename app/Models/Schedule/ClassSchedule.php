<?php

namespace App\Models\Schedule;

use App\Models\BookProgram;
use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    use HasFactory;

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
        'class_code',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function book()
    {
        return $this->belongsTo(BookProgram::class, 'book_id');
    }

    public function time()
    {
        return $this->belongsTo(ClassTimeCode::class, 'time_code_id');
    }

    public function classDaySchedules()
    {
        return $this->hasMany(ClassDaySchedule::class);
    }

    public function day()
    {
        return $this->belongsTo(ClassDayCode::class, 'day_code_id');
    }
}
