<?php

namespace App\Models\Schedule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassTimeCode extends Model
{
    use HasFactory, SoftDeletes;

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
        return $this->hasMany(ClassSchedule::class, 'time_code_id', 'time_code_id');
    }
}
