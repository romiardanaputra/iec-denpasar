<?php

namespace Database\Seeders\Transaction;

use App\Models\Transaction\Order;
use App\Models\Transaction\Registration;
use App\Models\User;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::get()->each(function ($user) {

            $registration = Registration::factory()->create([
                'user_id' => $user->id,
            ]);

            Order::factory()->count(rand(1, 2))
                ->forRegistran($registration->id)
                ->withItems(rand(1, 2))
                ->create();
        });

    }
}
