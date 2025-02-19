<?php

namespace Database\Factories\Transaction;

use App\Models\Program\Program;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction\Registration>
 */
class RegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::get();
        $programs = Program::get();

        $user = $users->random();
        $program = $programs->random();

        return [
            'user_id' => $user->id,
            'program_id' => $program->program_id,
            'student_name' => $this->faker->name,
            'birthplace' => $this->faker->city,
            'birthdate' => $this->faker->date,
            'address' => $this->faker->address,
            'education' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'Diploma', 'Sarjana', 'Magister', 'Doktor']),
            'job' => $this->faker->jobTitle,
            'market' => $this->faker->company,
            'parent_guardian' => $this->faker->name,
            'is_visible' => $this->faker->boolean(),
        ];
    }
}
