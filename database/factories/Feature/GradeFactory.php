<?php

namespace Database\Factories\Feature;

use App\Models\Transaction\Registration;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feature\Grade>
 */
class GradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $levels = ['Level 1', 'Level 2', 'Level 3', 'Level 4', 'Level 5', 'Level 6'];
        $level = $this->faker->unique(true)->randomElement($levels);

        $readingGrade = $this->faker->numberBetween(1, 100);
        $listeningGrade = $this->faker->numberBetween(1, 100);
        $speakingGrade = $this->faker->numberBetween(1, 100);
        $writingGrade = $this->faker->numberBetween(1, 100);
        $averageGrade = ($readingGrade + $listeningGrade + $speakingGrade + $writingGrade) / 4;

        $users = User::get();

        return [
            'registration_id' => Registration::factory(),
            'user_id' => $users->random()->id,
            'level_name' => $level,
            'badge_grade' => $this->faker->randomElement(['Need Improvement', 'Good Job', 'Excellent']),
            'reading_grade' => $readingGrade,
            'listening_grade' => $listeningGrade,
            'speaking_grade' => $speakingGrade,
            'writing_grade' => $writingGrade,
            'average_grade' => round($averageGrade, 2),
            'strong_area' => $this->faker->sentence,
            'improvement_area' => $this->faker->sentence,
            'weak_area' => $this->faker->sentence,
            'deleted_at' => null,
        ];
    }

    public function forStudent($registration_id)
    {
        return $this->state(function (array $attributes) use ($registration_id) {
            return [
                'registration_id' => $registration_id,
            ];
        });
    }
}
