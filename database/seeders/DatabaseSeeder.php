<?php

namespace Database\Seeders;

use Database\Seeders\Blog\AuthorSeeder;
use Database\Seeders\Blog\CategorySeeder;
use Database\Seeders\Blog\PostSeeder;
use Database\Seeders\Feature\GradeSeeder;
use Database\Seeders\Program\BookSeeder;
use Database\Seeders\Program\ImageSeeder;
use Database\Seeders\Program\ProgramDetailSeeder;
use Database\Seeders\Program\ProgramSeeder;
use Database\Seeders\Schedule\ClassDayCodeSeeder;
use Database\Seeders\Schedule\ClassScheduleSeeder;
use Database\Seeders\Schedule\ClassTimeCodeSeeder;
use Database\Seeders\Transaction\DummyOrderSeeder;
use Database\Seeders\Transaction\TransactionSeeder;
use Database\Seeders\Web\FaqSeeder;
use Database\Seeders\Web\TestimonialSeeder;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Delete the existing storage directory
        $this->command->info('Deleting existing storage directory...');
        Storage::deleteDirectory('public');

        // Regenerate the storage directory
        $this->command->info('Regenerating storage directory...');
        Storage::makeDirectory('public');

        // Run the seeders
        $this->command->info('Running seeders...');

        $this->call([
            RoleSeeder::class,
            ClassDayCodeSeeder::class,
            ClassTimeCodeSeeder::class,
            BookSeeder::class,
            ProgramSeeder::class,
            TeamSeeder::class,
            // DummyOrderSeeder::class,
            ClassScheduleSeeder::class,
            ProgramDetailSeeder::class,
            ImageSeeder::class,
            FaqSeeder::class,
            TestimonialSeeder::class,
            AuthorSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            // TransactionSeeder::class,
            // GradeSeeder::class
        ]);
        $this->command->info('Database seeding completed successfully.');
    }
}
