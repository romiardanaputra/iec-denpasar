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
        // \App\Models\Program\Program::all()->each(function ($program) {
        //     $benefits = [];
        //     for ($i = 0; $i < 3; $i++) {
        //         $benefits[] = ['item' => fake()->sentence];
        //     }

        //     ProgramDetail::create([
        //         'program_id' => $program->program_id,
        //         'long_description' => fake()->paragraphs(3, true),
        //         'level' => fake()->randomElement(['1', '2', '3', '4', '5', '6']),
        //         'benefits' => $benefits,
        //     ]);
        // });

        // Atau jika Anda ingin menambahkan detail program secara manual
        $programDetails = [
            [
                'program_id' => 1, // English for Kids
                'long_description' => 'Program "English for Kids" dirancang khusus untuk anak-anak usia Sekolah Dasar (SD). Fokus utama program ini adalah mengembangkan kemampuan berkomunikasi dalam Bahasa Inggris melalui kegiatan belajar yang menyenangkan. Anak-anak akan diajak untuk belajar sambil bermain dengan metode pembelajaran interaktif seperti games, storytelling, dan role-playing. Program ini juga membantu anak-anak membangun kepercayaan diri dalam menggunakan Bahasa Inggris sehari-hari.',
                'level' => 'Level 1 - Level 6',
                'benefits' => json_encode([
                    ['item' => 'Meningkatkan kemampuan berbicara Bahasa Inggris secara aktif'],
                    ['item' => 'Belajar melalui kegiatan menyenangkan seperti games dan storytelling'],
                    ['item' => 'Membangun kepercayaan diri dalam berkomunikasi'],
                    ['item' => 'Pengembangan kosakata dasar Bahasa Inggris'],
                ]),
            ],
            [
                'program_id' => 2, // English for Children
                'long_description' => 'Program "English for Children" ditujukan untuk anak-anak usia dini hingga pra-sekolah. Dengan pendekatan belajar sambil bermain, program ini menciptakan lingkungan belajar yang menyenangkan dan efektif. Anak-anak akan diajarkan dasar-dasar Bahasa Inggris melalui lagu, permainan, dan aktivitas kreatif lainnya. Program ini bertujuan untuk memperkenalkan Bahasa Inggris kepada anak-anak sejak dini sehingga mereka dapat mengembangkan logika bahasa dengan lebih mudah.',
                'level' => 'Level 1 - Level 3',
                'benefits' => json_encode([
                    ['item' => 'Memperkenalkan Bahasa Inggris sejak dini'],
                    ['item' => 'Belajar melalui lagu, permainan, dan aktivitas kreatif'],
                    ['item' => 'Mengembangkan logika bahasa secara alami'],
                    ['item' => 'Menciptakan fondasi kuat untuk pembelajaran Bahasa Inggris di masa depan'],
                ]),
            ],
            [
                'program_id' => 3, // English for Junior
                'long_description' => 'Program "English for Junior" dirancang untuk siswa Sekolah Menengah Pertama (SMP). Metode pembelajaran komunikatif diterapkan untuk membantu siswa menguasai empat aspek utama Bahasa Inggris: Listening, Reading, Speaking, dan Writing. Kegiatan di kelas tetap menekankan suasana belajar yang menyenangkan, sehingga siswa termotivasi untuk belajar dan merasa percaya diri dalam menggunakan Bahasa Inggris.',
                'level' => 'Level 1 - Level 4',
                'benefits' => json_encode([
                    ['item' => 'Menguasai empat aspek utama Bahasa Inggris: Listening, Reading, Speaking, dan Writing'],
                    ['item' => 'Suasana belajar yang menyenangkan dan interaktif'],
                    ['item' => 'Meningkatkan motivasi belajar dan kepercayaan diri'],
                    ['item' => 'Persiapan untuk ujian Bahasa Inggris tingkat SMP'],
                ]),
            ],
            [
                'program_id' => 4, // General English
                'long_description' => 'Program "General English" ditujukan untuk peserta kursus dewasa yang ingin meningkatkan kemampuan berkomunikasi dalam Bahasa Inggris untuk keperluan umum. Dengan pendekatan komunikatif, program ini membantu peserta berbicara Bahasa Inggris dengan lancar dan percaya diri. Materi pembelajaran mencakup berbagai topik sehari-hari, seperti percakapan sosial, pekerjaan, dan traveling.',
                'level' => 'Level 1 - Level 6',
                'benefits' => json_encode([
                    ['item' => 'Meningkatkan kemampuan berbicara Bahasa Inggris secara lancar'],
                    ['item' => 'Pendekatan komunikatif untuk pembelajaran yang efektif'],
                    ['item' => 'Materi pembelajaran yang relevan dengan kehidupan sehari-hari'],
                    ['item' => 'Persiapan untuk berkomunikasi dalam situasi profesional dan sosial'],
                ]),
            ],
        ];

        foreach ($programDetails as $detail) {
            ProgramDetail::factory()->create($detail);
        }
    }
}
