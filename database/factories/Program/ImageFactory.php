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
            'path' => $this->faker->randomElement([
                'https://ik.imagekit.io/kht744nua/iec_dps/iec-3.png?updatedAt=1739430767472',
                'https://ik.imagekit.io/kht744nua/iec_dps/iec-6.png?updatedAt=1739430767446',
                'https://ik.imagekit.io/kht744nua/iec_dps/iec-5.png?updatedAt=1739430767449',
                'https://ik.imagekit.io/kht744nua/iec_dps/iec-8.png?updatedAt=1739430767253',
                'https://ik.imagekit.io/kht744nua/iec_dps/iec-1.png?updatedAt=1739430767392',
                'https://ik.imagekit.io/kht744nua/iec_dps/iec-2.png?updatedAt=1739430767249',
                'https://ik.imagekit.io/kht744nua/iec_dps/iec-4.png?updatedAt=1739430767400',
                'https://ik.imagekit.io/kht744nua/iec_dps/iec-7.png?updatedAt=1739430767446',
                'https://ik.imagekit.io/kht744nua/iec_dps/iec-9.png?updatedAt=1739430767402',
                // tambahkan path-path lainnya
            ]),
        ];
    }
}
