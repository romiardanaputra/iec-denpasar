<?php

namespace Database\Factories\Program;

use App\Models\Program\Image;
use App\Models\Program\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Image::class;

    public function definition(): array
    {
        return [
            'program_id' => Program::factory(),
            'path' => 'https://picsum.photos/seed/picsum/200/300',
        ];
    }
}
