<?php

namespace Database\Seeders\Program;

use App\Models\Program\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Jika Anda ingin membuat 8 gambar untuk setiap program yang ada
        \App\Models\Program\Program::all()->each(function ($program) {
            Image::factory()->count(8)->create([
                'program_id' => $program->program_id,
            ]);
        });

        // Atau jika Anda ingin menambahkan gambar secara manual
        // $images = [
        //   [
        //     'program_id' => 1,
        //     'path' => 'https://ik.imagekit.io/kht744nua/iec_dps/iec-3.png?updatedAt=1739430767472',
        //   ],
        //   [
        //     'program_id' => 1,
        //     'path' => 'https://ik.imagekit.io/kht744nua/iec_dps/iec-6.png?updatedAt=1739430767446',
        //   ],
        //   [
        //     'program_id' => 1,
        //     'path' => 'https://ik.imagekit.io/kht744nua/iec_dps/iec-5.png?updatedAt=1739430767449',
        //   ],
        //   [
        //     'program_id' => 1,
        //     'path' => 'https://ik.imagekit.io/kht744nua/iec_dps/iec-8.png?updatedAt=1739430767253'
        //   ],
        //   // tambahkan gambar lainnya untuk program 1
        //   [
        //     'program_id' => 2,
        //     'path' => 'https://ik.imagekit.io/kht744nua/iec_dps/iec-1.png?updatedAt=1739430767392',
        //   ],
        //   [
        //     'program_id' => 2,
        //     'path' => 'https://ik.imagekit.io/kht744nua/iec_dps/iec-8.png?updatedAt=1739430767253',
        //   ],
        //   [
        //     'program_id' => 2,
        //     'path' => 'https://ik.imagekit.io/kht744nua/iec_dps/iec-1.png?updatedAt=1739430767392',
        //   ],
        //   [
        //     'program_id' => 2,
        //     'path' => 'https://ik.imagekit.io/kht744nua/iec_dps/iec-8.png?updatedAt=1739430767253',
        //   ],
        //   // tambahkan gambar lainnya untuk program 2

        //   [
        //     'program_id' => 3,
        //     'path' => 'https://ik.imagekit.io/kht744nua/iec_dps/iec-8.png?updatedAt=1739430767253',
        //   ],
        //   [
        //     'program_id' => 3,
        //     'path' => 'https://ik.imagekit.io/kht744nua/iec_dps/iec-1.png?updatedAt=1739430767392',
        //   ],
        //   [
        //     'program_id' => 3,
        //     'path' => 'https://ik.imagekit.io/kht744nua/iec_dps/iec-5.png?updatedAt=1739430767449',
        //   ],
        //   [
        //     'program_id' => 3,
        //     'path' => 'https://ik.imagekit.io/kht744nua/iec_dps/iec-8.png?updatedAt=1739430767253'
        //   ],

        //   [
        //     'program_id' => 4,
        //     'path' => 'https://ik.imagekit.io/kht744nua/iec_dps/iec-8.png?updatedAt=1739430767253',
        //   ],
        //   [
        //     'program_id' => 4,
        //     'path' => 'https://ik.imagekit.io/kht744nua/iec_dps/iec-1.png?updatedAt=1739430767392',
        //   ],
        //   [
        //     'program_id' => 4,
        //     'path' => 'https://ik.imagekit.io/kht744nua/iec_dps/iec-5.png?updatedAt=1739430767449',
        //   ],
        //   [
        //     'program_id' => 4,
        //     'path' => 'https://ik.imagekit.io/kht744nua/iec_dps/iec-8.png?updatedAt=1739430767253'
        //   ],
        // ];

        // foreach ($images as $image) {
        //   Image::factory()->create($image);
        // }
    }
}
