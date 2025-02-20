<?php

namespace App\Models\Schedule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassTimeCode extends Model
{
    use HasFactory;

    protected $table = 'class_time_codes';

    protected $primaryKey = 'time_code_id';

    protected $guarded = ['time_code_id'];

    protected $fillable = [
        'time_code',
        'time_start',
        'time_end',
    ];

    public function classes()
    {
        return $this->hasMany(ClassSchedule::class);
    }
}
