<?php

namespace Database\Seeders;

use App\Models\Blog\Author;
use App\Models\Blog\Category as BlogCategory;
use App\Models\Blog\Link;
use App\Models\Blog\Post;
use Closure;
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
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Helper\ProgressBar;

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
            // ClassDayCodeSeeder::class,
            // ClassTimeCodeSeeder::class,
            // BookSeeder::class,
            // ProgramSeeder::class,
            // TeamSeeder::class,
            // DummyOrderSeeder::class,
            // ClassScheduleSeeder::class,
            // ProgramDetailSeeder::class,
            // ImageSeeder::class,
            // FaqSeeder::class,
            // TestimonialSeeder::class,
            // TransactionSeeder::class,
            // GradeSeeder::class
        ]);
        $this->command->info('Database seeding completed successfully.');

        //     $this->command->warn(PHP_EOL.'Creating blog categories...');
        //     $blogCategories = $this->withProgressBar(20, fn () => BlogCategory::factory(1)
        //         ->count(20)
        //         ->create());
        //     $this->command->info('Blog categories created.');

        //     $this->command->warn(PHP_EOL.'Creating blog authors and posts...');
        //     $this->withProgressBar(20, fn () => Author::factory(1)
        //         ->has(
        //             Post::factory()->count(5)
        //                 ->state(fn (array $attributes, Author $author) => ['blog_category_id' => $blogCategories->random(1)->first()->id]),
        //             'posts'
        //         )
        //         ->create());
        //     $this->command->info('Blog authors and posts created.');

        //     $this->command->warn(PHP_EOL.'Creating blog links...');
        //     $this->withProgressBar(20, fn () => Link::factory(1)
        //         ->count(20)
        //         ->create());
        //     $this->command->info('Blog links created.');
        // }

        // protected function withProgressBar(int $amount, Closure $createCollectionOfOne): Collection
        // {
        //     $progressBar = new ProgressBar($this->command->getOutput(), $amount);

        //     $progressBar->start();

        //     $items = new Collection;

        //     foreach (range(1, $amount) as $i) {
        //         $items = $items->merge(
        //             $createCollectionOfOne()
        //         );
        //         $progressBar->advance();
        //     }

        //     $progressBar->finish();

        //     $this->command->getOutput()->writeln('');

        //     return $items;
        // }
    }
}
