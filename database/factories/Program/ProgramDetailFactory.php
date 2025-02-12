<?php

namespace Database\Factories\Program;

use App\Models\Program\Program;
use App\Models\Program\ProgramDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program\ProgramDetail>
 */
class ProgramDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ProgramDetail::class;

    public function definition()
    {

        $benefits = [];
        for ($i = 0; $i < 3; $i++) {
            $benefits[] = ['item' => $this->faker->sentence];
        }

        return [
            'program_id' => Program::factory(),
            'long_description' => $this->faker->paragraphs(3, true),
            'level' => $this->faker->randomElement(['Beginner', 'Intermediate', 'Advanced']),
            'benefits' => $benefits,
        ];
    }
}
