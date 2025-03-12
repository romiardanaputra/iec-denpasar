<?php

namespace Database\Seeders\Blog;

use App\Models\Blog\Author;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua data dari tabel blog_authors dan blog_categories
        $authors = Author::all();
        $categories = Category::all();

        // Data dummy untuk post
        $posts = [
            [
                'title' => 'Tips Meningkatkan Kemampuan Speaking Bahasa Inggris',
                'slug' => 'tips-meningkatkan-kemampuan-speaking-bahasa-inggris',
                'content' => 'Untuk meningkatkan kemampuan speaking Bahasa Inggris, Anda perlu berlatih secara konsisten. Cobalah untuk berbicara dengan teman atau menggunakan aplikasi seperti HelloTalk. Selain itu, menonton film dalam Bahasa Inggris juga membantu.',
                'seo_title' => 'Cara Efektif Meningkatkan Speaking Bahasa Inggris',
                'seo_description' => 'Pelajari tips praktis untuk meningkatkan kemampuan berbicara Bahasa Inggris dengan cepat dan efektif.',
                'published_at' => now(),
            ],
            [
                'title' => 'Materi Grammar Dasar untuk Pemula',
                'slug' => 'materi-grammar-dasar-untuk-pemula',
                'content' => 'Grammar adalah fondasi penting dalam mempelajari Bahasa Inggris. Mulailah dengan mempelajari tenses dasar seperti Simple Present dan Past Tense. Gunakan latihan soal untuk memperkuat pemahaman.',
                'seo_title' => 'Belajar Grammar Bahasa Inggris untuk Pemula',
                'seo_description' => 'Panduan lengkap untuk mempelajari grammar Bahasa Inggris bagi pemula.',
                'published_at' => now(),
            ],
            [
                'title' => 'Latihan Listening dengan Podcast Bahasa Inggris',
                'slug' => 'latihan-listening-dengan-podcast-bahasa-inggris',
                'content' => 'Podcast adalah cara yang menyenangkan untuk melatih listening skill. Beberapa podcast populer untuk pemula adalah "English as a Second Language" dan "BBC Learning English". Dengarkan secara rutin untuk meningkatkan pemahaman.',
                'seo_title' => 'Latihan Listening Bahasa Inggris dengan Podcast',
                'seo_description' => 'Temukan rekomendasi podcast Bahasa Inggris terbaik untuk melatih listening skill Anda.',
                'published_at' => now(),
            ],
            [
                'title' => 'Strategi Menulis Essay Bahasa Inggris',
                'slug' => 'strategi-menulis-essay-bahasa-inggris',
                'content' => 'Menulis essay dalam Bahasa Inggris memerlukan struktur yang jelas. Mulailah dengan introduction, body, dan conclusion. Gunakan kata penghubung seperti "however" dan "therefore" untuk membuat tulisan lebih logis.',
                'seo_title' => 'Cara Menulis Essay Bahasa Inggris dengan Baik',
                'seo_description' => 'Pelajari strategi menulis essay Bahasa Inggris yang efektif untuk ujian atau pekerjaan.',
                'published_at' => now(),
            ],
            [
                'title' => 'Persiapan Ujian IELTS Writing',
                'slug' => 'persiapan-ujian-ielts-writing',
                'content' => 'IELTS Writing memiliki dua bagian: Task 1 dan Task 2. Untuk Task 1, fokus pada deskripsi grafik atau diagram. Untuk Task 2, tulis essay dengan argumen yang jelas dan terstruktur.',
                'seo_title' => 'Tips Sukses IELTS Writing',
                'seo_description' => 'Panduan persiapan IELTS Writing untuk mencapai skor tinggi.',
                'published_at' => now(),
            ],
            [
                'title' => 'Kosakata Penting untuk TOEFL Preparation',
                'slug' => 'kosakata-penting-untuk-toefl-preparation',
                'content' => 'TOEFL menguji kosakata akademik. Pelajari kata-kata seperti "analyze", "evaluate", dan "synthesize". Gunakan flashcard untuk memperkuat ingatan.',
                'seo_title' => 'Kosakata Penting untuk TOEFL',
                'seo_description' => 'Daftar kosakata penting untuk persiapan TOEFL yang efektif.',
                'published_at' => now(),
            ],
            [
                'title' => 'Metode Pembelajaran Bahasa Inggris untuk Anak-anak',
                'slug' => 'metode-pembelajaran-bahasa-inggris-untuk-anak-anak',
                'content' => 'Anak-anak belajar Bahasa Inggris dengan cara yang menyenangkan. Gunakan metode seperti storytelling, games, dan lagu untuk membuat proses belajar lebih interaktif.',
                'seo_title' => 'Metode Belajar Bahasa Inggris untuk Anak-anak',
                'seo_description' => 'Pelajari metode pembelajaran Bahasa Inggris yang cocok untuk anak-anak.',
                'published_at' => now(),
            ],
            [
                'title' => 'Cara Cepat Menguasai Pronunciation Bahasa Inggris',
                'slug' => 'cara-cepat-menguasai-pronunciation-bahasa-inggris',
                'content' => 'Pronunciation yang baik sangat penting untuk komunikasi. Latih pelafalan dengan aplikasi seperti ELSA Speak atau YouTube. Fokus pada fonetik dan intonasi.',
                'seo_title' => 'Menguasai Pronunciation Bahasa Inggris',
                'seo_description' => 'Tips dan trik untuk meningkatkan pronunciation Bahasa Inggris dengan cepat.',
                'published_at' => now(),
            ],
            [
                'title' => 'Rekomendasi Buku Bahasa Inggris untuk Pemula',
                'slug' => 'rekomendasi-buku-bahasa-inggris-untuk-pemula',
                'content' => 'Ada banyak buku yang cocok untuk pemula, seperti "English Grammar in Use" oleh Raymond Murphy dan "Practice Makes Perfect: English Vocabulary". Pilih buku yang sesuai dengan kebutuhan Anda.',
                'seo_title' => 'Buku Bahasa Inggris Terbaik untuk Pemula',
                'seo_description' => 'Daftar rekomendasi buku Bahasa Inggris terbaik untuk pemula.',
                'published_at' => now(),
            ],
        ];

        // Loop melalui setiap post dan buat entri di database
        foreach ($posts as $post) {
            $author = $authors->random(); // Pilih penulis secara acak
            $category = $categories->random(); // Pilih kategori secara acak

            Post::create([
                'blog_author_id' => $author->id,
                'blog_category_id' => $category->id,
                'title' => $post['title'],
                'slug' => $post['slug'],
                'content' => $post['content'],
                'seo_title' => $post['seo_title'],
                'seo_description' => $post['seo_description'],
                'published_at' => $post['published_at'],
                'image' => 'https://ik.imagekit.io/kht744nua/iec_dps/english-blog-cover.webp?updatedAt=1741762508408', // Gambar dummy
            ]);
        }
    }
}
