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
            $table->foreignId('registration_id')->index()->constrained('registrations')->cascadeOnDelete();
            $table->foreignId('user_id')->index()->constrained('users')->cascadeOnDelete();
            $table->string('level_name')->index();
            $table->string('badge_grade');
            $table->float('reading_grade');
            $table->float('listening_grade');
            $table->float('speaking_grade');
            $table->float('writing_grade');
            $table->float('average_grade');
            $table->text('strong_area')->nullable();
            $table->text('improvement_area')->nullable();
            $table->text('weak_area')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
