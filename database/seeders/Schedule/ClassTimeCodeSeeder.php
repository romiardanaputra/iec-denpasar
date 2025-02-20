<?php

namespace Database\Seeders\Schedule;

use App\Models\Schedule\ClassTimeCode;
use Illuminate\Database\Seeder;

class ClassTimeCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $times = [
            ['time_code' => 'A', 'time_start' => '07:30:00', 'time_end' => '09:00:00'],
            ['time_code' => 'B', 'time_start' => '09:00:00', 'time_end' => '10:30:00'],
            ['time_code' => 'C', 'time_start' => '10:30:00', 'time_end' => '12:00:00'],
            ['time_code' => 'D', 'time_start' => '15:00:00', 'time_end' => '16:30:00'],
            ['time_code' => 'E', 'time_start' => '16:30:00', 'time_end' => '18:00:00'],
            ['time_code' => 'F', 'time_start' => '18:00:00', 'time_end' => '19:30:00'],
        ];

        foreach ($times as $time) {
            ClassTimeCode::factory()->create([
                'time_code' => $time['time_code'],
                'time_start' => $time['time_start'],
                'time_end' => $time['time_end'],
            ]);
        }
    }
}
