<?php

namespace Database\Seeders\Web;

use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::create([
            'question' => 'Apa saja program yang ditawarkan oleh IEC Denpasar?',
            'answer' => 'IEC Denpasar menawarkan berbagai program seperti kursus bahasa Inggris, persiapan IELTS/TOEFL, konsultasi studi ke luar negeri, dan pelatihan soft skills.',
        ]);

        Faq::create([
            'question' => 'Bagaimana cara mendaftar program di IEC Denpasar?',
            'answer' => 'Anda dapat mendaftar melalui website resmi kami atau datang langsung ke kantor IEC Denpasar untuk mendapatkan panduan pendaftaran lebih lanjut.',
        ]);

        Faq::create([
            'question' => 'Apakah ada jaminan kelulusan untuk program IELTS/TOEFL?',
            'answer' => 'Kami tidak memberikan jaminan kelulusan, namun kami menyediakan materi pembelajaran yang komprehensif dan pengajar yang berpengalaman untuk membantu Anda mencapai skor yang diinginkan.',
        ]);

        Faq::create([
            'question' => 'Berapa biaya untuk mengikuti program di IEC Denpasar?',
            'answer' => 'Biaya program bervariasi tergantung pada jenis program yang dipilih. Silakan hubungi tim kami untuk informasi lebih detail.',
        ]);

        Faq::create([
            'question' => 'Apakah ada fasilitas konsultasi gratis untuk studi ke luar negeri?',
            'answer' => 'Ya, kami menyediakan sesi konsultasi gratis bagi calon siswa yang ingin mendiskusikan rencana studi mereka ke luar negeri.',
        ]);
    }
}
