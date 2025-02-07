<?php

namespace Database\Factories\Program;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_name' => $this->faker->words(2, true).' '.$this->faker->numberBetween(1, 6),
            'book_code' => Str::upper($this->faker->unique()->bothify('??#')),
        ];
    }
}
