<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Team::factory(8)->create();
        $teams = [
            [
                'name' => 'Kadek Romi Ardana Putra',
                'slug' => 'kadek-romi-ardana-putra',
                'age' => '21',
                'gender' => 'male',
                'short_description' => 'Saya suka mengajar orang lain karena dengan hal tersebut saya mendapatkan benefit yang sama',
                'image' => 'https://ik.imagekit.io/kht744nua/iec_dps/male-4.webp?updatedAt=1741751677535',
                'linkedin' => 'https://www.linkedin.com/in/romiardana/',
                'facebook' => 'https://www.facebook.com/romiardanap',
                'instagram' => 'https://www.instagram.com/romiardanap_/',
                'whatsapp' => 'https://www.whatsapp.com/?lang=id_ID',

                'is_active' => 1,
            ],
            [
                'name' => 'Ni Made Ayu Widiastuti',
                'slug' => 'ni-made-ayu-widiastuti',
                'age' => '25',
                'gender' => 'female',
                'short_description' => 'Bahasa Inggris adalah kunci untuk membuka pintu kesempatan global.',
                'image' => 'https://ik.imagekit.io/kht744nua/iec_dps/female-2.webp?updatedAt=1741751677474',
                'linkedin' => 'https://www.linkedin.com/in/ayuwidiastuti/',
                'facebook' => 'https://www.facebook.com/ayuwidiastuti',
                'instagram' => 'https://www.instagram.com/ayuwidiastuti/',
                'whatsapp' => 'https://wa.me/6282345678901',
                'is_active' => 1,

            ],
            [
                'name' => 'I Gede Arya Sudarma',
                'slug' => 'i-gede-arya-sudarma',
                'age' => '28',
                'gender' => 'male',
                'short_description' => 'Mengajar bahasa Inggris adalah cara saya berkontribusi kepada masyarakat.',
                'image' => 'https://ik.imagekit.io/kht744nua/iec_dps/male-2.webp?updatedAt=1741751677380',
                'linkedin' => 'https://www.linkedin.com/in/aryasudarma/',
                'facebook' => 'https://www.facebook.com/aryasudarma',
                'instagram' => 'https://www.instagram.com/aryasudarma/',
                'whatsapp' => 'https://wa.me/6283456789012',
                'is_active' => 1,

            ],
            [
                'name' => 'Putu Eka Pradnyani',
                'slug' => 'putu-eka-pradnyani',
                'age' => '23',
                'gender' => 'female',
                'short_description' => 'Saya percaya bahwa belajar bahasa adalah tentang membangun hubungan antarbudaya.',
                'image' => 'https://ik.imagekit.io/kht744nua/iec_dps/female-3.webp?updatedAt=1741751677766',
                'linkedin' => 'https://www.linkedin.com/in/ekapradnyani/',
                'facebook' => 'https://www.facebook.com/ekapradnyani',
                'instagram' => 'https://www.instagram.com/ekapradnyani/',
                'whatsapp' => 'https://wa.me/6284567890123',
                'is_active' => 1,

            ],
            [
                'name' => 'I Wayan Aditya Wirawan',
                'slug' => 'i-wayan-aditya-wirawan',
                'age' => '26',
                'gender' => 'male',
                'short_description' => 'Saya senang melihat siswa berkembang dan meraih impian mereka.',
                'image' => 'https://ik.imagekit.io/kht744nua/iec_dps/male-1.webp?updatedAt=1741751677540',
                'linkedin' => 'https://www.linkedin.com/in/adityawirawan/',
                'facebook' => 'https://www.facebook.com/adityawirawan',
                'instagram' => 'https://www.instagram.com/adityawirawan/',
                'whatsapp' => 'https://wa.me/6285678901234',
                'is_active' => 1,

            ],
            [
                'name' => 'Ni Komang Sari Dewi',
                'slug' => 'ni-komang-sari-dewi',
                'age' => '24',
                'gender' => 'female',
                'short_description' => 'Bahasa Inggris adalah alat untuk mengeksplorasi dunia.',
                'image' => 'https://ik.imagekit.io/kht744nua/iec_dps/female-4.webp?updatedAt=1741751677434',
                'linkedin' => 'https://www.linkedin.com/in/saridewi/',
                'facebook' => 'https://www.facebook.com/saridewi',
                'instagram' => 'https://www.instagram.com/saridewi/',
                'whatsapp' => 'https://wa.me/6286789012345',
                'is_active' => 1,

            ],
            [
                'name' => 'I Nyoman Bagus Mahendra',
                'slug' => 'i-nyoman-bagus-mahendra',
                'age' => '27',
                'gender' => 'male',
                'short_description' => 'Saya ingin membantu siswa menjadi lebih percaya diri dalam berbicara bahasa Inggris.',
                'image' => 'https://ik.imagekit.io/kht744nua/iec_dps/male-3.webp?updatedAt=1741751677461',
                'linkedin' => 'https://www.linkedin.com/in/bagusmahendra/',
                'facebook' => 'https://www.facebook.com/bagusmahendra',
                'instagram' => 'https://www.instagram.com/bagusmahendra/',
                'whatsapp' => 'https://wa.me/6287890123456',
                'is_active' => 1,

            ],
            [
                'name' => 'Ni Luh Putu Ayu Saraswati',
                'slug' => 'ni-luh-putu-ayu-saraswati',
                'age' => '22',
                'gender' => 'female',
                'short_description' => 'Saya suka berbagi pengetahuan dan pengalaman saya dalam belajar bahasa Inggris.',
                'image' => 'https://ik.imagekit.io/kht744nua/iec_dps/female-2.webp?updatedAt=1741751677474',
                'linkedin' => 'https://www.linkedin.com/in/saraswatiayu/',
                'facebook' => 'https://www.facebook.com/saraswatiayu',
                'instagram' => 'https://www.instagram.com/saraswatiayu/',
                'whatsapp' => 'https://wa.me/6288901234567',
                'is_active' => 1,

            ],
        ];

        foreach ($teams as $team) {
            Team::factory()->create([
                'name' => $team['name'],
                'slug' => $team['slug'],
                'age' => $team['age'],
                'gender' => $team['gender'],
                'short_description' => $team['short_description'],
                'image' => $team['image'],
                'linkedin' => $team['linkedin'],
                'facebook' => $team['facebook'],
                'instagram' => $team['instagram'],
                'whatsapp' => $team['whatsapp'],
            ]);
        }
    }
}
