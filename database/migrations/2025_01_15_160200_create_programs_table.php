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
        Schema::create('programs', function (Blueprint $table) {
            $table->id('program_id');
            $table->string('name')->index();
            $table->string('slug')->unique()->nullable();
            $table->longText('short_description');
            $table->string('image');
            $table->string('rate');
            $table->float('price');
            $table->float('register_fee');
            $table->boolean('is_visible')->default(false);
            $table->date('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
