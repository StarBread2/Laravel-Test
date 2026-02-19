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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')
                ->constrained('students')
                ->cascadeOnDelete();                                        // students.course (students data and course)

            // Foreign key to school_years
            $table->foreignId('school_year_id')
                ->constrained('school_years')
                ->cascadeOnDelete();                                        // schoolyear (year, first semester, active)

            $table->tinyInteger('year_level');                              // 3rd yr
            $table->enum('status', ['enrolled', 'completed', 'dropped']);   // enrolled
            $table->decimal('gpa', 3, 2)->nullable();                       // null
            $table->integer('total_units');                                 // 30

            // created at and updated at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
