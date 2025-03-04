<?php

namespace Database\Factories;

use Carbon\Carbon;
use Database\Factories\Concerns\CanCreateImages;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    use CanCreateImages;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'slug' => Str::slug($this->faker->name),
            'age' => $this->faker->numberBetween(18, 35),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'short_description' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(),
            'linkedin' => $this->faker->url,
            'facebook' => $this->faker->url,
            'instagram' => $this->faker->url,
            'whatsapp' => $this->faker->phoneNumber,
            'join_at' => Carbon::now(),
            'is_active' => $this->faker->boolean,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => null,
        ];
    }
}
