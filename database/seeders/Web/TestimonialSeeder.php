<?php

namespace Database\Seeders\Web;

use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::create([
            'name' => 'Ni Made Ayu',
            'position' => 'Alumni IEC Denpasar',
            'testimony' => 'Belajar di IEC Denpasar benar-benar mengubah hidup saya. Metode pembelajaran yang interaktif dan mentor yang berdedikasi membuat saya percaya diri berbicara bahasa Inggris.',
            'image_path' => 'assets/images/testimonials/alumni-1.jpg',
        ]);

        Testimonial::create([
            'name' => 'I Gede Putu',
            'position' => 'Profesional di Bidang Pariwisata',
            'testimony' => 'Saya sangat bersyukur telah memilih IEC Denpasar. Programnya fleksibel dan hasilnya luar biasa. Sekarang saya bisa berkomunikasi dengan lancar di tempat kerja.',
            'image_path' => 'assets/images/testimonials/alumni-2.jpg',
        ]);
    }
}
