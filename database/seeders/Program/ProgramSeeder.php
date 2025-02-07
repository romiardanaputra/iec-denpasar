<?php

namespace Database\Seeders\Program;

use App\Models\Program\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'name' => 'English for kid',
                'slug' => 'english-for-kid',
                'short_description' => 'English For Kids adalah program yang dirancang khusus bagi anak-anak usia Sekolah Dasar. Pada  program ini kemampuan anak berkomunikasi dengan menggunakan Bahasa Inggris lebih dikembangkan. Aktifitas dalam menggunakan bahasa Inggris di kelas dibimbing dengan berbagai kegiatan belajar berbahasa yang menyenangkan dan sesuai dengan usia anak serta mendukung keberhasilan anak dalam penguasaan bahasa Inggris. Teknik pembelajaran yang interaktif dan variasi games yang diterapkan di program ini akan meningkatkan ketrampilan berbahasa pada anak..',
                'image' => 'https://placeimg.com/100/100/any?'.rand(1, 100),
                'rate' => '5',
                'price' => 1200000,
                'register_fee' => 100000,
                'is_visible' => 1,
                'published_at' => date('Y-m-d'),
            ],
            [
                'name' => 'English for children',
                'slug' => 'english-for-children',
                'short_description' => '“Semakin dini anak belajar bahasa, semakin mudah baginya untuk mengembangkan kemampuan berbahasa dan logika. Dengan penekanan pada belajar sambil bermain, program bahasa Inggris untuk anak-anak, akan sangat menyenangkan dan didukung dengan fasilitas belajar yang memadai menjadikan belajar lebih efektif dan efisien”.',
                'image' => 'https://placeimg.com/100/100/any?'.rand(1, 100),
                'rate' => '5',
                'price' => 1200000,
                'register_fee' => 100000,
                'is_visible' => 1,
                'published_at' => date('Y-m-d'),
            ],
            [
                'name' => 'English For Junior',
                'slug' => 'english-for-junior',
                'short_description' => 'Program ini dirancang khusus bagi anak usia Sekolah Menengah Pertama . Metode pembelajaran yang communicative  diterapkan sesuai dengan usia mereka. Aspek pembelajaran mencakup semua aspek berbahasa seperti seperti Listening, Reading, Speaking dan Writing. Kegiatan di kelas tetap menekankan pada situasi belajar yang menyenangkan sehingga meningkatkan motivasi belajar, dan rasa percaya diri. Dengan suasana belajar yang ‘fun’, tujuan belajar yang efektif dapat tercapai..',
                'image' => 'https://placeimg.com/100/100/any?'.rand(1, 100),
                'rate' => '5',
                'price' => 1200000,
                'register_fee' => 100000,
                'is_visible' => 1,
                'published_at' => date('Y-m-d'),
            ],
            [
                'name' => 'General English for Communication',
                'slug' => 'general-english-for-communication',
                'short_description' => 'General English Program adalah Program yang dirancang untuk melatih peserta kursus berkomunikasi dalam Bahasa Inggris untuk keperluan umum. Dengan pendekatan komunikatif, siswa diharapkan dapat berkomunikasi dalam Bahasa Inggris dengan lancar dan penuh percaya diri.',
                'image' => 'https://placeimg.com/100/100/any?'.rand(1, 100),
                'rate' => '5',
                'price' => 1200000,
                'register_fee' => 100000,
                'is_visible' => 1,
                'published_at' => date('Y-m-d'),
            ],
        ];

        foreach ($programs as $program) {
            Program::factory()->create([
                'name' => $program['name'],
                'slug' => $program['slug'],
                'short_description' => $program['short_description'],
                'image' => $program['image'],
                'rate' => $program['rate'],
                'price' => $program['price'],
                'register_fee' => $program['register_fee'],
                'is_visible' => $program['is_visible'],
                'published_at' => $program['published_at'],
            ]);
        }
    }
}
