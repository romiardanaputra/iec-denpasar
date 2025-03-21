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
        Schema::create('program_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Program::class, 'program_id')->index()->constrained()->cascadeOnDelete();
            $table->text('long_description')->nullable();
            $table->string('level')->nullable();
            $table->json('benefits')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_details');
    }
};
