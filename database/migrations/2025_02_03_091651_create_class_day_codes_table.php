<?php

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
        Schema::create('class_day_codes', function (Blueprint $table) {
            $table->id('day_code_id');
            $table->string('day_code', 2)->unique();
            $table->string('day_name', 30);
            $table->timestamps();
            $table->softDeletesDatetime();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_day_codes');
    }
};
