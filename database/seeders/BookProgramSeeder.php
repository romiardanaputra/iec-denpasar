<?php

namespace Database\Seeders;

use App\Models\BookProgram;
use Illuminate\Database\Seeder;

class BookProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            ['name' => 'Move on 1', 'code' => 'MO1'],
            ['name' => 'Move on 2', 'code' => 'MO2'],
            ['name' => 'Move on 3', 'code' => 'MO3'],
            ['name' => 'Move on 4', 'code' => 'MO4'],
            ['name' => 'Move on 5', 'code' => 'MO5'],
            ['name' => 'Move on 6', 'code' => 'MO6'],
            ['name' => 'Linkage 1', 'code' => 'LK1'],
            ['name' => 'Linkage 2', 'code' => 'LK2'],
            ['name' => 'Linkage 3', 'code' => 'LK3'],
            ['name' => 'Linkage 4', 'code' => 'LK4'],
            ['name' => 'Linkage 5', 'code' => 'LK5'],
            ['name' => 'Linkage 6', 'code' => 'LK6'],
            ['name' => 'Blue Ocean 1', 'code' => 'BO1'],
            ['name' => 'Blue Ocean 2', 'code' => 'BO2'],
            ['name' => 'Blue Ocean 3', 'code' => 'BO3'],
            ['name' => 'Blue Ocean 4', 'code' => 'BO4'],
            ['name' => 'Blue Ocean 5', 'code' => 'BO5'],
            ['name' => 'Blue Ocean 6', 'code' => 'BO6'],
        ];

        foreach ($books as $book) {
            BookProgram::factory()->create([
                'book_name' => $book['name'],
                'book_code' => $book['code'],
            ]);
        }
    }
}
