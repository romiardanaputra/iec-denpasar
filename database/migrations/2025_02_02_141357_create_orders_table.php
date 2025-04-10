<?php

use App\Models\Program\Program;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(Program::class, 'program_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('registration_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('order_id', 36)->unique();
            $table->double('total_price');
            $table->enum('payment_method', ['online', 'cash']);
            $table->enum('status', ['pending', 'processing', 'completed', 'failed', 'cancelled'])->default('pending');
            $table->enum('payment_status', ['unpaid', 'paid', 'expired', 'cancelled', 'failed'])
                ->default('unpaid');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
