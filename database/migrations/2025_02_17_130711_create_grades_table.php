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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id')->constrained('registrations')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('level_name');
            $table->string('badge_grade');
            $table->integer('reading_grade')->unsigned();
            $table->integer('listening_grade')->unsigned();
            $table->integer('speaking_grade')->unsigned();
            $table->decimal('average_grade', 5, 2)->unsigned();
            $table->text('strong_area')->nullable();
            $table->text('improvement_area')->nullable();
            $table->text('weak_area')->nullable();
            $table->timestamps();
            $table->softDeletesDatetime();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
