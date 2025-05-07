<?php

use App\Models\Program\Book;
use App\Models\Program\Program;
use App\Models\Schedule\ClassDayCode;
use App\Models\Schedule\ClassTimeCode;
use App\Models\Team;
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
            $table->foreignIdFor(Program::class, 'program_id')->index()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Book::class, 'book_id')->index()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(ClassTimeCode::class, 'time_code_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(ClassDayCode::class, 'day_code_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Team::class, 'team_id')->index()->constrained()->cascadeOnDelete();
            $table->string('class_code', 10)->unique()->index();
            $table->integer('slot')->default(20);
            $table->enum('slot_status', ['available', 'full'])->default('available');
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
