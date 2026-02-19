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
        Schema::create('subject_sections', function (Blueprint $table) {
            $table->id();

            // Foreign key to subjects
            $table->foreignId('subject_id')
                ->constrained('subjects')
                ->restrictOnDelete();                   // Subject description (name, units)

            $table->string('section_code', 20);         // A (Section)

            // Foreign key to school_years
            $table->foreignId('school_year_id')
                ->constrained('school_years')
                ->restrictOnDelete();                   // Current year subject section used (2025, first semester, is active)

            $table->tinyInteger('year_level');          // 3 (3RD YR)
            $table->integer('capacity');                // 40

            // Created at only
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_sections');
    }
};
