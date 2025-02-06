<?php

namespace App\Models\Schedule;

use Illuminate\Database\Eloquent\Model;

class ClassDaySchedule extends Model
{
    public function classDayCode()
    {
        return $this->BelongsTo(ClassDayCode::class);
    }

    public function classSchedule()
    {
        return $this->belongsTo(ClassSchedule::class);
    }
}
