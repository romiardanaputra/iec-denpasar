<?php

namespace Database\Seeders\Feature;

use App\Models\Feature\Grade;
use App\Models\Transaction\Registration;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        Registration::all()->each(function ($registration) use ($faker) {
            $levels = ['Level 1', 'Level 2', 'Level 3', 'Level 4', 'Level 5', 'Level 6'];

            // Shuffle levels to ensure uniqueness
            shuffle($levels);

            // Limit to a maximum of 6 levels per student
            $selectedLevels = array_slice($levels, 0, $faker->numberBetween(1, 6));

            foreach ($selectedLevels as $level) {
                Grade::factory()->forStudent($registration->id)->create([
                    'level_name' => $level,
                ]);
            }
        });
    }
}
