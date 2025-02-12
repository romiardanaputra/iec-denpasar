<?php

namespace Database\Factories\Schedule;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule\ClassDayCode>
 */
class ClassDayCodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'day_code' => $this->faker->unique()->regexify('[A-Z]{2}'),
            'day_name' => $this->faker->dayOfWeek,
        ];
    }

    public function withSpecificDay($code, $name)
    {
        return $this->state(function (array $attributes) use ($code, $name) {
            return [
                'day_code' => $code,
                'day_name' => $name,
            ];
        });
    }
}
