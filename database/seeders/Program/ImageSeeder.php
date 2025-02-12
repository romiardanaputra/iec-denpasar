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
        //     [
        //         'program_id' => 1,
        //         'path' => 'https://via.placeholder.com/640x480?text=Image+1',
        //     ],
        //     [
        //         'program_id' => 1,
        //         'path' => 'https://via.placeholder.com/640x480?text=Image+2',
        //     ],
        //     // tambahkan gambar lainnya untuk program 1
        //     [
        //         'program_id' => 2,
        //         'path' => 'https://via.placeholder.com/640x480?text=Image+1',
        //     ],
        //     [
        //         'program_id' => 2,
        //         'path' => 'https://via.placeholder.com/640x480?text=Image+2',
        //     ],
        //     // tambahkan gambar lainnya untuk program 2
        // ];

        // foreach ($images as $image) {
        //     Image::factory()->create($image);
        // }
    }
}
