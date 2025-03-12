<?php

namespace Database\Seeders\Web;

use App\Models\Web\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $testimonials = [
            [
                'name' => 'Ni Made Ayu',
                'position' => 'Alumni IEC Denpasar',
                'testimony' => 'Belajar di IEC Denpasar benar-benar mengubah hidup saya. Metode pembelajaran yang interaktif dan mentor yang berdedikasi membuat saya percaya diri berbicara bahasa Inggris.',
                'image_path' => 'https://ik.imagekit.io/kht744nua/iec_dps/female-3.webp?updatedAt=1741751677766',
            ],
            [
                'name' => 'I Gede Putu',
                'position' => 'Profesional di Bidang Pariwisata',
                'testimony' => 'Saya sangat bersyukur telah memilih IEC Denpasar. Programnya fleksibel dan hasilnya luar biasa. Sekarang saya bisa berkomunikasi dengan lancar di tempat kerja.',
                'image_path' => 'https://ik.imagekit.io/kht744nua/iec_dps/male-2.webp?updatedAt=1741751677766',
            ],
            [
                'name' => 'Kadek Sinta',
                'position' => 'Mahasiswa Universitas Udayana',
                'testimony' => 'IEC Denpasar membantu saya meningkatkan kemampuan bahasa Inggris dengan cepat. Tutor-tutornya sangat sabar dan metodenya mudah dipahami.',
                'image_path' => 'https://ik.imagekit.io/kht744nua/iec_dps/female-1.webp?updatedAt=1741751677766',
            ],
            [
                'name' => 'I Wayan Adi',
                'position' => 'Pengusaha Lokal',
                'testimony' => 'Terima kasih kepada IEC Denpasar, saya sekarang bisa berkomunikasi dengan klien internasional. Pelatihan mereka sangat praktis dan efektif.',
                'image_path' => 'https://ik.imagekit.io/kht744nua/iec_dps/male-3.webp?updatedAt=1741751677766',
            ],
            [
                'name' => 'Ni Komang Dewi',
                'position' => 'Guru Bahasa Inggris',
                'testimony' => 'Sebagai guru, saya merasa perlu meningkatkan kemampuan saya. IEC Denpasar memberikan pelatihan yang sangat profesional dan mendalam.',
                'image_path' => 'https://ik.imagekit.io/kht744nua/iec_dps/female-2.webp?updatedAt=1741751677766',
            ],
            [
                'name' => 'I Nyoman Bagus',
                'position' => 'Freelancer Digital',
                'testimony' => 'Bahasa Inggris adalah kunci kesuksesan saya sebagai freelancer. Terima kasih IEC Denpasar atas dukungan dan bimbingannya.',
                'image_path' => 'https://ik.imagekit.io/kht744nua/iec_dps/male-4.webp?updatedAt=1741751677766',
            ],
            [
                'name' => 'Putu Eka Pradnyani',
                'position' => 'Marketing Executive',
                'testimony' => 'IEC Denpasar membantu saya meningkatkan kepercayaan diri dalam presentasi bahasa Inggris. Sangat direkomendasikan!',
                'image_path' => 'https://ik.imagekit.io/kht744nua/iec_dps/female-4.webp?updatedAt=1741751677766',
            ],
            [
                'name' => 'I Made Sudarma',
                'position' => 'Pegawai Bank Internasional',
                'testimony' => 'Program IEC Denpasar sangat membantu saya dalam beradaptasi dengan lingkungan kerja multinasional. Tutor-tutornya sangat profesional.',
                'image_path' => 'https://ik.imagekit.io/kht744nua/iec_dps/male-5.webp?updatedAt=1741751677766',
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::factory()->create([
                'name' => $testimonial['name'],
                'position' => $testimonial['position'],
                'testimony' => $testimonial['testimony'],
                'image_path' => $testimonial['image_path'],
            ]);
        }
    }
}
