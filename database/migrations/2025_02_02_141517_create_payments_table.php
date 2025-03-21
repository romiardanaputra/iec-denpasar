<?php

use App\Models\Transaction\Order;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Order::class, 'order_id')->nullable()->constrained()->cascadeOnDelete();
            $table->double('amount');
            $table->string('snap_token')->nullable();
            $table->enum('status', ['PENDING', 'PAID', 'FAILED', 'EXPIRE', 'CANCEL'])->default('PENDING');
            $table->dateTime('expired_at')->nullable();
            $table->dateTime('paid_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
