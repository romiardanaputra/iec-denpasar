<?php

namespace Database\Factories\Transaction;

use App\Models\Program\Program;
use App\Models\Transaction\Order;
use App\Models\Transaction\OrderItem;
use App\Models\Transaction\Registration;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $programs = Program::get();
        $users = User::get();

        $program = $programs->random();
        $user = $users->random();

        $paymentStatus = $this->faker->randomElement(['unpaid', 'paid', 'expired', 'cancelled', 'failed']);
        $status = $paymentStatus === 'paid' ? 'completed' : $this->faker->randomElement(['pending', 'processing', 'completed', 'failed', 'cancelled']);

        return [
            'user_id' => $user->id,
            'program_id' => $program->program_id,
            'registration_id' => Registration::factory(),
            'order_id' => $this->faker->unique()->uuid,
            'total_price' => $this->faker->randomFloat(2, 100, 1000),
            'status' => $status,
            'payment_status' => $paymentStatus,
        ];
    }

    // digunakan untuk keperluan seeding development bukan production
    public function forRegistran($registranId)
    {
        return $this->state(function (array $attributes) use ($registranId) {
            return [
                'registration_id' => $registranId,
            ];
        });
    }

    public function withItems(int $count = 2)
    {
        return $this->afterCreating(function (Order $order) use ($count) {
            OrderItem::factory()->count($count)->create([
                'order_id' => $order->id,
                'program_id' => $order->program_id,
            ]);
        });
    }
}
