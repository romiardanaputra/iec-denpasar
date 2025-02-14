<?php

namespace Database\Seeders\Schedule;

use App\Models\Program\Book;
use App\Models\Program\Program;
use App\Models\Schedule\ClassDayCode;
use App\Models\Schedule\ClassSchedule;
use App\Models\Schedule\ClassTimeCode;
use App\Models\Team;
use Illuminate\Database\Seeder;

class ClassScheduleSeeder extends Seeder
{
    public function run()
    {
        // Assuming you have at least one program, book, time_code, and day_code in your database
        // $programs = Program::all();
        // $books = Book::all();
        // $timeCodes = ClassTimeCode::all();
        // $dayCodes = ClassDayCode::all();
        // $teams = Team::all();

        // foreach ($programs as $program) {
        //   foreach ($timeCodes as $timeCode) {
        //     foreach ($dayCodes as $dayCode) {
        //       foreach ($teams as $team) {
        //         ClassSchedule::factory()->create([
        //           'program_id' => $program->program_id,
        //           'book_id' => $books->random()->book_id,
        //           'time_code_id' => $timeCode->time_code_id,
        //           'day_code_id' => $dayCode->day_code_id,
        //           'team_id' => $team->team_id
        //         ]);
        //       }

        //     }
        //   }
        // }

        ClassSchedule::factory()->count(30)->create();
    }
}
