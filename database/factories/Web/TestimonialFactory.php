<?php

namespace Database\Factories\Web;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Web\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'position' => $this->faker->jobTitle(),
            'testimony' => $this->faker->paragraph(3),
            'image_path' => function () {
                // Simpan gambar dummy ke storage dan kembalikan pathnya
                $imagePath = 'assets/images/testimonials/'.$this->faker->unique()->word().'.jpg';
                Storage::disk('public')->put($imagePath, file_get_contents('https://via.placeholder.com/150'));

                return $imagePath;
            },
        ];
    }
}
