<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 1 teacher multiple subjects
     */
    public function up(): void
    {
        Schema::create('teacher_assignments', function (Blueprint $table) {
            $table->id();

            // TO TEACHERS
            $table->foreignId('teacher_id')
                ->constrained('teachers')
                ->restrictOnDelete();

            // TO SECTIONS
            $table->foreignId('section_id')
                ->constrained('subject_sections')
                ->restrictOnDelete();

            // ROLE
            $table->enum('role', [
                'lecturer'
            ]);

            // created at and updated at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_assignments');
    }
};
