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
        Schema::create('class_schedules', function (Blueprint $table) {
            $table->id('class_schedule_id');
            $table->unsignedBigInteger('program_id');
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('time_code_id');
            $table->unsignedBigInteger('day_code_id');
            $table->string('class_code', 10)->unique();
            $table->timestamps();

            $table->foreign('program_id')->references('program_id')->on('programs')->onDelete('cascade');
            $table->foreign('book_id')->references('book_id')->on('books')->onDelete('cascade');
            $table->foreign('time_code_id')->references('time_code_id')->on('class_time_codes')->onDelete('cascade');
            $table->foreign('day_code_id')->references('day_code_id')->on('class_day_codes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_schedules');
    }
};
