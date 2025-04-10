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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignid('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Program::class, 'program_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('student_name')->index();
            $table->string('birthplace')->index();
            $table->date('birthdate');
            $table->text('address');
            $table->string('education');
            $table->string('job');
            $table->string('market');
            $table->string('parent_guardian')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
