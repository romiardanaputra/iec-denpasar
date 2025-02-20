<?php

namespace Database\Factories\Schedule;

use App\Models\Program\Book;
use App\Models\Program\Program;
use App\Models\Schedule\ClassDayCode;
use App\Models\Schedule\ClassSchedule;
use App\Models\Schedule\ClassTimeCode;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule\ClassSchedule>
 */
class ClassScheduleFactory extends Factory
{
    protected $model = ClassSchedule::class;

    // public function definition()
    // {
    //   $program = Program::inRandomOrder()->first();
    //   $book = Book::where('program_id', $program->program_id)->inRandomOrder()->first();
    //   $timeCode = ClassTimeCode::inRandomOrder()->first();
    //   $dayCode = ClassDayCode::inRandomOrder()->first();

    //   $dayCodePart = strtoupper(substr($dayCode->day_code, 0, 2));
    //   $bookNamePart = strtoupper(substr($book->book_code, 0, 3));
    //   $timeCodePart = strtoupper(substr($timeCode->time_code, 0, 1));
    //   $classCode = $dayCodePart . $bookNamePart . $timeCodePart;

    //   // Ensure the class_code is unique
    //   while (ClassSchedule::where('class_code', $classCode)->exists()) {
    //     $timeCode = ClassTimeCode::inRandomOrder()->first();
    //     $timeCodePart = strtoupper(substr($timeCode->time_code, 0, 1));
    //     $classCode = $dayCodePart . $bookNamePart . $timeCodePart;
    //   }

    //   return [
    //     'program_id' => $program->program_id,
    //     'book_id' => $book->book_id,
    //     'time_code_id' => $timeCode->time_code_id,
    //     'day_code_id' => $dayCode->day_code_id,
    //     'class_code' => $classCode,
    //   ];
    // }

    public function definition(): array
    {
        $programId = Program::inRandomOrder()->first()->program_id;
        $bookId = Book::inRandomOrder()->first()->book_id;
        $timeCodeId = ClassTimeCode::inRandomOrder()->first()->time_code_id;
        $dayCodeId = ClassDayCode::inRandomOrder()->first()->day_code_id;
        $teamId = Team::inRandomOrder()->first()->team_id;

        $classCode = $this->generateUniqueClassCode($dayCodeId, $bookId, $timeCodeId);

        return [
            'program_id' => $programId,
            'book_id' => $bookId,
            'time_code_id' => $timeCodeId,
            'day_code_id' => $dayCodeId,
            'team_id' => $teamId,
            'class_code' => $classCode,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    private function generateUniqueClassCode($dayCodeId, $bookId, $timeCodeId)
    {
        do {
            // Fetch the relevant codes
            $dayCode = ClassDayCode::find($dayCodeId)->day_code;
            $timeCode = ClassTimeCode::find($timeCodeId)->time_code;
            $bookCode = Book::find($bookId)->book_code;

            // Generate the class code
            $classCode = strtoupper(substr($dayCode, 0, 1).substr($bookCode, 0, 3).substr($timeCode, 0, 1));

            // Check if the class code already exists
        } while (ClassSchedule::where('class_code', $classCode)->exists());

        return $classCode;
    }
}
