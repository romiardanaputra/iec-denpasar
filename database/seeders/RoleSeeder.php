<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        $customUsers = [
            [
                'name' => 'Kadek Romi Ardana Putra (S.Admin)',
                'phone' => '+6285792479249',
                'email' => 'romiardanaputra@gmail.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'address' => 'Jl. Merdeka No. 123, Denpasar',
                'city' => 'Denpasar',
                'postal_code' => '80361',
                'country_code' => 'ID',
                'about' => 'Saya adalah seorang developer web profesional.',
            ],
            [
                'name' => 'John Doe',
                'phone' => '+6281234567890',
                'email' => 'johndoe@gmail.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'address' => 'Jl. Gajah Mada No. 456, Bali',
                'city' => 'Denpasar',
                'postal_code' => '80234',
                'country_code' => 'ID',
                'about' => 'Saya adalah seorang desainer grafis.',
            ],
            [
                'name' => 'Jane Smith',
                'phone' => '+6289876543210',
                'email' => 'janesmith@gmail.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'address' => 'Jl. Bypass Ngurah Rai No. 789, Denpasar',
                'city' => 'Denpasar',
                'postal_code' => '80123',
                'country_code' => 'ID',
                'about' => 'Saya adalah seorang manajer proyek.',
            ],
        ];

        foreach ($customUsers as $key => $userData) {
            $user = User::create($userData);
            if ($key === 0) {
                $user->assignRole($adminRole);
            } else {
                $user->assignRole($userRole);
            }
        }
    }
}
