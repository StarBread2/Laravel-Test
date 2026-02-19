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
        Schema::create('subject_schedules', function (Blueprint $table) {
            $table->id();

            $table->foreignId('section_id')
                ->constrained('subject_sections')
                ->restrictOnDelete();                                   //.subjects.subject section (subject detail and section)

            // DAY AND TIME
            $table->enum('day_of_week', ['M','T','W','TH','F','S']);    // M
            $table->time('start_time');                                 // 09:00
            $table->time('end_time');                                   // 10:00

            // ROOM
            $table->string('room', 100);                                // CAS 104
            
            // Created at only
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_schedules');
    }
};
