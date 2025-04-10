<?php

namespace App\Models\Feature;

use App\Models\Transaction\Registration;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grade extends Model
{
    /** @use HasFactory<\Database\Factories\Feature\GradeFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'grades';

    protected $primaryKey = 'id';

    // student_id is equal to registran ID
    protected $fillable = [
        'registration_id',
        'user_id',
        'level_name',
        'badge_grade',
        'reading_grade',
        'listening_grade',
        'speaking_grade',
        'writing_grade',
        'average_grade',
        'strong_area',
        'improvement_area',
        'weak_area',
    ];

    protected $casts = [

        'listening_grade' => 'float',
        'writing_grade' => 'float',
        'speaking_grade' => 'float',
        'reading_grade' => 'float',
        'average_grade' => 'float',
    ];

    public function registration()
    {
        return $this->belongsTo(Registration::class, 'registration_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($grade) {
            $existingGradesCount = self::where('registration_id', $grade->registration_id)->count();
            if ($existingGradesCount >= 6) {
                throw new \Exception('A user can have a maximum of 6 grades.');
            }

            $existingLevels = self::where('registration_id', $grade->registration_id)->pluck('level_name')->toArray();
            if (in_array($grade->level_name, $existingLevels)) {
                throw new \Exception('Level name must be unique for each user.');
            }
        });

        static::updating(function ($grade) {
            $existingLevels = self::where('registration_id', $grade->registration_id)
                ->where('id', '!=', $grade->id)
                ->pluck('level_name')->toArray();
            if (in_array($grade->level_name, $existingLevels)) {
                throw new \Exception('Level name must be unique for each user.');
            }
        });
        // Automatically calculate the average grade before saving
        static::saving(function ($grade) {
            $readingGrade = (float) ($grade->reading_grade ?? 0);
            $listeningGrade = (float) ($grade->listening_grade ?? 0);
            $speakingGrade = (float) ($grade->speaking_grade ?? 0);
            $writingGrade = (float) ($grade->writing_grade ?? 0);

            $averageGrade = ($readingGrade + $listeningGrade + $speakingGrade + $writingGrade) / 4;
            $grade->average_grade = round($averageGrade, 2);
        });
    }
}
