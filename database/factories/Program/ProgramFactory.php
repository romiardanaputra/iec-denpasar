<?php

namespace Database\Factories\Program;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program\Program>
 */
class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->sentence(3);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'short_description' => $this->faker->paragraph(3),
            'image' => 'https://placeimg.com/100/100/any?'.rand(1, 100),
            'rate' => $this->faker->randomFloat(1, 4, 5),
            'price' => $this->faker->numberBetween(1000000, 2000000),
            'register_fee' => 100000,
            'is_visible' => $this->faker->boolean(),
            'published_at' => now()->format('Y-m-d'),
        ];
    }
}
