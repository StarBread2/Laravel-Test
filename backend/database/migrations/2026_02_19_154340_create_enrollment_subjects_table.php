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
        Schema::create('enrollment_subjects', function (Blueprint $table) {
            $table->id();

            // Foreign key to enrollments
            $table->foreignId('enrollment_id')
                ->constrained('enrollments')
                ->cascadeOnDelete();                                                // enrollments.students.schoolyear (enroled data (total units), student data)

            // Foreign key to subject_sections
            $table->foreignId('section_id')
                ->constrained('subject_sections')
                ->cascadeOnDelete();                                                // subject_sections.subject (subject name, subject data (total enrolled))

            // Grades
            $table->decimal('final_grade', 5, 2)->nullable();                       // 89.00
            $table->decimal('equivalent_grade', 3, 2)->nullable();                  // 1.10
            $table->decimal('reexam_grade', 5, 2)->nullable();                      // null

            // Remarks
            $table->enum('remarks', ['passed','failed','incomplete','ongoing']);    //passed

            // created at and updated at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollment_subjects');
    }
};
