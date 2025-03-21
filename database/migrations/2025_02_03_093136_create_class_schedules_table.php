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
            $table->foreignId('program_id')->index()->constrained('programs')->cascadeOnDelete();
            $table->foreignId('book_id')->index()->constrained('books')->cascadeOnDelete();
            $table->foreignId('time_code_id')->constrained('class_time_codes')->cascadeOnDelete();
            $table->foreignId('day_code_id')->constrained('class_day_codes')->cascadeOnDelete();
            $table->foreignId('team_id')->index()->constrained('teams')->cascadeOnDelete();
            $table->string('class_code', 10)->unique()->index();
            $table->timestamps();
            $table->softDeletes();

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
