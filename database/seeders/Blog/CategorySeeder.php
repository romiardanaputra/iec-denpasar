<?php

namespace Database\Seeders\Blog;

use App\Models\Blog\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Grammar and Vocabulary', 'slug' => 'grammar-and-vocabulary', 'description' => 'Kategori ini mencakup pembelajaran tata bahasa...', 'is_visible' => 1],
            ['name' => 'Speaking Skills', 'slug' => 'speaking-skills', 'description' => 'Fokus pada pengembangan kemampuan berbicara...', 'is_visible' => 1],
            ['name' => 'Listening Comprehension', 'slug' => 'listening-comprehension', 'description' => 'Latihan untuk meningkatkan pemahaman mendengarkan...', 'is_visible' => 1],
            ['name' => 'Writing Techniques', 'slug' => 'writing-techniques', 'description' => 'Tips dan teknik untuk menulis dalam Bahasa Inggr...', 'is_visible' => 1],
            ['name' => 'Reading Strategies', 'slug' => 'reading-strategies', 'description' => 'Strategi untuk membaca dan memahami teks Bahasa...', 'is_visible' => 1],
            ['name' => 'Pronunciation Practice', 'slug' => 'pronunciation-practice', 'description' => 'Latihan untuk meningkatkan pelafalan Bahasa Inggris.', 'is_visible' => 1],
            ['name' => 'IELTS Preparation', 'slug' => 'ielts-preparation', 'description' => 'Materi persiapan untuk ujian IELTS.', 'is_visible' => 1],
            ['name' => 'TOEFL Tips', 'slug' => 'toefl-tips', 'description' => 'Tips dan trik untuk sukses dalam ujian TOEFL.', 'is_visible' => 1],
            ['name' => 'English for Kids', 'slug' => 'english-for-kids', 'description' => 'Kategori khusus untuk anak-anak yang belajar Bahasa...', 'is_visible' => 1],
        ];

        foreach ($categories as $category) {
            Category::factory()->create($category);
        }
    }
}
