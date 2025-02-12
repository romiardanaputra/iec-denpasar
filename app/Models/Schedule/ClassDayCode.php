<?php

namespace App\Models\Schedule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassDayCode extends Model
{
    use HasFactory;

    protected $primaryKey = 'day_code_id';

    protected $table = 'class_day_codes';

    protected $guarded = ['day_code_id'];

    protected $fillable = [
        'day_code',
        'day_name',
    ];

    public function ClassSchedules()
    {
        return $this->hasMany(ClassSchedule::class);
    }
}
