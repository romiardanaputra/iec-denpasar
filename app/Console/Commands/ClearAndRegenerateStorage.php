<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClearAndRegenerateStorage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:clear-regenerate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear and regenerate the storage directory';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Delete the existing storage directory
        $this->info('Deleting existing storage directory...');
        Storage::deleteDirectory('public');

        // Regenerate the storage directory
        $this->info('Regenerating storage directory...');
        Storage::makeDirectory('public');

        $this->info('Storage cleared and regenerated successfully.');

        return Command::SUCCESS;
    }
}
