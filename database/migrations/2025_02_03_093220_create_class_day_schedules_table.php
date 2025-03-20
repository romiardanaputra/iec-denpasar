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
        Schema::create('class_day_schedules', function (Blueprint $table) {
            $table->id('class_day_schedule_id');
            $table->unsignedBigInteger('class_schedule_id');
            $table->unsignedBigInteger('day_code_id');
            $table->timestamps();
            $table->softDeletesDatetime();

            $table->foreign('class_schedule_id')->references('class_schedule_id')->on('class_schedules')->onDelete('cascade');
            $table->foreign('day_code_id')->references('day_code_id')->on('class_day_codes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_day_schedules');
    }
};
