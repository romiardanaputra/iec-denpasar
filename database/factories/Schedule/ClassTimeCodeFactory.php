<?php

namespace Database\Factories\Schedule;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule\ClassTimeCode>
 */
class ClassTimeCodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'time_code' => $this->faker->unique()->randomLetter,
            'time_start' => $this->faker->time('H:i:s'),
            'time_end' => $this->faker->time('H:i:s'),
        ];
    }
}
