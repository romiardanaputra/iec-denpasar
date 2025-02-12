<?php

namespace Database\Factories\Schedule;

use App\Models\Program\Book;
use App\Models\Program\Program;
use App\Models\Schedule\ClassDayCode;
use App\Models\Schedule\ClassSchedule;
use App\Models\Schedule\ClassTimeCode;
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
        return [
            'program_id' => Program::factory(),
            'book_id' => Book::factory(),
            'time_code_id' => ClassTimeCode::factory(),
            'day_code_id' => ClassDayCode::factory(),
            'class_code' => $this->faker->unique()->bothify('?????##'),
        ];
    }
}
