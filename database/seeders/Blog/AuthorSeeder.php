<?php

namespace Database\Seeders\Blog;

use App\Models\Blog\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            [
                'team_id' => 1,
                'email' => 'romiardanaputra@gmail.com',
                'bio' => 'Meet your English course mentor, the ultimate language guru! With a passion for teaching and a sprinkle of fun, we’ll turn grammar gremlins into vocabulary wizards! #LearnWithJoy #EnglishMagic',
            ],

            [
                'team_id' => 2,
                'email' => 'nimadeayuwidiastuti@gmail.com',
                'bio' => 'Meet your English course mentor, the ultimate language guru! With a passion for teaching and a sprinkle of fun, we’ll turn grammar gremlins into vocabulary wizards! #LearnWithJoy #EnglishMagic',
            ],
            [
                'team_id' => 3,
                'email' => 'igedearyasudarma@gmail.com',
                'bio' => 'Meet your English course mentor, the ultimate language guru! With a passion for teaching and a sprinkle of fun, we’ll turn grammar gremlins into vocabulary wizards! #LearnWithJoy #EnglishMagic',
            ],
            [
                'team_id' => 4,
                'email' => 'putuekapradnyani@gmail.com',
                'bio' => 'Meet your English course mentor, the ultimate language guru! With a passion for teaching and a sprinkle of fun, we’ll turn grammar gremlins into vocabulary wizards! #LearnWithJoy #EnglishMagic',
            ],
            [
                'team_id' => 5,
                'email' => 'iwayanadityawirawan@gmail.com',
                'bio' => 'Meet your English course mentor, the ultimate language guru! With a passion for teaching and a sprinkle of fun, we’ll turn grammar gremlins into vocabulary wizards! #LearnWithJoy #EnglishMagic',
            ],
            [
                'team_id' => 6,
                'email' => 'nikomangsaridewi',
                'bio' => 'Meet your English course mentor, the ultimate language guru! With a passion for teaching and a sprinkle of fun, we’ll turn grammar gremlins into vocabulary wizards! #LearnWithJoy #EnglishMagic',
            ],
            [
                'team_id' => 7,
                'email' => 'inyomanbagusmahendra@gmail.com',
                'bio' => 'Meet your English course mentor, the ultimate language guru! With a passion for teaching and a sprinkle of fun, we’ll turn grammar gremlins into vocabulary wizards! #LearnWithJoy #EnglishMagic',
            ],
            [
                'team_id' => 8,
                'email' => 'niluhputuayusaraswati@gmail.com',
                'bio' => 'Meet your English course mentor, the ultimate language guru! With a passion for teaching and a sprinkle of fun, we’ll turn grammar gremlins into vocabulary wizards! #LearnWithJoy #EnglishMagic',

            ],
        ];

        foreach ($authors as $author) {
            Author::factory()->create($author);
        }
    }
}
