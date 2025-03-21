<?php

use App\Models\Program\Program;
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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Order::class, 'order_id')
                ->index()
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(Program::class, 'program_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();
            $table->string('product_name')->nullable()->index();
            $table->double('price');
            $table->integer('quantity')->unsigned();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
