<?php

namespace Database\Seeders\Schedule;

use App\Models\Program\Book;
use App\Models\Program\Program;
use App\Models\Schedule\ClassDayCode;
use App\Models\Schedule\ClassSchedule;
use App\Models\Schedule\ClassTimeCode;
use Illuminate\Database\Seeder;

class ClassScheduleSeeder extends Seeder
{
    // public function run()
    // {
    //   // Clear existing data using DELETE instead of TRUNCATE
    //   ClassSchedule::query()->delete();

    //   // Create 50 class schedules with unique class codes and different programs and times in one day
    //   ClassSchedule::factory()->count(50)->create();

    //   // Ensure each day has different programs and times
    //   $days = ClassDayCode::all();
    //   $programs = Program::all();
    //   $times = ClassTimeCode::all();

    //   foreach ($days as $day) {
    //     $usedTimes = [];
    //     foreach ($programs as $program) {
    //       $books = Book::where('program_id', $program->program_id)->get();
    //       foreach ($books as $book) {
    //         $availableTimes = $times->filter(function ($time) use ($usedTimes) {
    //           return !in_array($time->time_code_id, $usedTimes);
    //         });

    //         if ($availableTimes->isEmpty()) {
    //           break;
    //         }

    //         $time = $availableTimes->random();
    //         $usedTimes[] = $time->time_code_id;

    //         $dayCodePart = strtoupper(substr($day->day_code, 0, 2));
    //         $bookNamePart = strtoupper(substr($book->book_code, 0, 3));
    //         $timeCodePart = strtoupper(substr($time->time_code, 0, 1));
    //         $classCode = $dayCodePart . $bookNamePart . $timeCodePart;

    //         // Ensure the class_code is unique
    //         while (ClassSchedule::where('class_code', $classCode)->exists()) {
    //           $time = $availableTimes->random();
    //           $timeCodePart = strtoupper(substr($time->time_code, 0, 1));
    //           $classCode = $dayCodePart . $bookNamePart . $timeCodePart;
    //         }

    //         ClassSchedule::create([
    //           'program_id' => $program->program_id,
    //           'book_id' => $book->book_id,
    //           'time_code_id' => $time->time_code_id,
    //           'day_code_id' => $day->day_code_id,
    //           'class_code' => $classCode,
    //         ]);
    //       }
    //     }
    //   }
    // }

    public function run()
    {
        // Assuming you have at least one program, book, time_code, and day_code in your database
        $programs = Program::all();
        $books = Book::all();
        $timeCodes = ClassTimeCode::all();
        $dayCodes = ClassDayCode::all();

        foreach ($programs as $program) {
            foreach ($timeCodes as $timeCode) {
                foreach ($dayCodes as $dayCode) {
                    ClassSchedule::factory()->create([
                        'program_id' => $program->program_id,
                        'book_id' => $books->random()->book_id,
                        'time_code_id' => $timeCode->time_code_id,
                        'day_code_id' => $dayCode->day_code_id,
                    ]);
                }
            }
        }

    }
}
