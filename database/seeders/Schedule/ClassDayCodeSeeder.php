<?php

namespace Database\Seeders\Schedule;

use App\Models\Schedule\ClassDayCode;
use Illuminate\Database\Seeder;

class ClassDayCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days = [
            ['code' => 'M', 'name' => 'Monday'],
            ['code' => 'T', 'name' => 'Tuesday'],
            ['code' => 'W', 'name' => 'Wednesday'],
            ['code' => 'Th', 'name' => 'Thursday'],
            ['code' => 'F', 'name' => 'Friday'],
            ['code' => 'S', 'name' => 'Saturday'],
            ['code' => 'Su', 'name' => 'Sunday'],
        ];

        foreach ($days as $day) {
            ClassDayCode::factory()->create([
                'day_code' => $day['code'],
                'day_name' => $day['name'],
            ]);
        }
    }
}
