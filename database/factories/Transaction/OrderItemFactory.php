<?php

namespace Database\Factories\Transaction;

use App\Models\Program\Program;
use App\Models\Transaction\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $orders = Order::get();
        $programs = Program::get();

        $order = $orders->random();
        $program = $programs->random();

        return [
            'order_id' => $order->id,
            'program_id' => $program->program_id,
            'price' => $this->faker->randomFloat(2, 50, 500),
            'quantity' => 1,
        ];
    }
}
