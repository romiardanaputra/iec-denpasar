<?php

namespace Database\Seeders\Program;

use App\Models\Program\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            ['name' => 'Move on 1', 'code' => 'MO1', 'level' => '1', 'price' => 80000],
            ['name' => 'Move on 2', 'code' => 'MO2', 'level' => '2', 'price' => 85000],
            ['name' => 'Move on 3', 'code' => 'MO3', 'level' => '3', 'price' => 90000],
            ['name' => 'Move on 4', 'code' => 'MO4', 'level' => '4', 'price' => 90000],
            ['name' => 'Move on 5', 'code' => 'MO5', 'level' => '5', 'price' => 95000],
            ['name' => 'Move on 6', 'code' => 'MO6', 'level' => '6', 'price' => 95000],
            ['name' => 'Linkage 1', 'code' => 'LK1', 'level' => '1', 'price' => 80000],
            ['name' => 'Linkage 2', 'code' => 'LK2', 'level' => '2', 'price' => 85000],
            ['name' => 'Linkage 3', 'code' => 'LK3', 'level' => '3', 'price' => 90000],
            ['name' => 'Linkage 4', 'code' => 'LK4', 'level' => '4', 'price' => 90000],
            ['name' => 'Linkage 5', 'code' => 'LK5', 'level' => '5', 'price' => 95000],
            ['name' => 'Linkage 6', 'code' => 'LK6', 'level' => '6', 'price' => 95000],
            ['name' => 'Blue Ocean 1', 'code' => 'BO1', 'level' => '1', 'price' => 80000],
            ['name' => 'Blue Ocean 2', 'code' => 'BO2', 'level' => '2', 'price' => 85000],
            ['name' => 'Blue Ocean 3', 'code' => 'BO3', 'level' => '3', 'price' => 90000],
            ['name' => 'Blue Ocean 4', 'code' => 'BO4', 'level' => '4', 'price' => 90000],
            ['name' => 'Blue Ocean 5', 'code' => 'BO5', 'level' => '5', 'price' => 95000],
            ['name' => 'Blue Ocean 6', 'code' => 'BO6', 'level' => '6', 'price' => 95000],
        ];

        foreach ($books as $book) {
            Book::factory()->create([
                'book_name' => $book['name'],
                'book_code' => $book['code'],
                'level' => $book['level'],
                'book_price' => $book['price'],
            ]);
        }
    }
}
