<?php

namespace Database\Seeders\Program;

use App\Models\Program\ProgramDetail;
use Illuminate\Database\Seeder;

class ProgramDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Jika Anda ingin membuat detail program secara otomatis untuk setiap program yang ada
        \App\Models\Program\Program::all()->each(function ($program) {
            $benefits = [];
            for ($i = 0; $i < 3; $i++) {
                $benefits[] = ['item' => fake()->sentence];
            }

            ProgramDetail::create([
                'program_id' => $program->program_id,
                'long_description' => fake()->paragraphs(3, true),
                'level' => fake()->randomElement(['1', '2', '3', '4', '5', '6']),
                'benefits' => $benefits,
            ]);
        });

        // Atau jika Anda ingin menambahkan detail program secara manual
        // $programDetails = [
        //     [
        //         'program_id' => 1,
        //         'long_description' => 'Detail panjang program 1...',
        //         'level' => 'Beginner',
        //         'benefits' => json_encode([
        //             ['item' => 'Benefit 1'],
        //             ['item' => 'Benefit 2'],
        //             ['item' => 'Benefit 3'],
        //         ]),
        //     ],
        //     [
        //         'program_id' => 2,
        //         'long_description' => 'Detail panjang program 2...',
        //         'level' => 'Intermediate',
        //         'benefits' => json_encode([
        //             ['item' => 'Benefit A'],
        //             ['item' => 'Benefit B'],
        //             ['item' => 'Benefit C'],
        //         ]),
        //     ],
        //     // tambahkan detail program lainnya jika diperlukan
        // ];

        // foreach ($programDetails as $detail) {
        //     ProgramDetail::factory()->create($detail);
        // }
    }
}
