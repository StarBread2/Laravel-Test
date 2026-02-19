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
        Schema::create('school_years', function (Blueprint $table) {
            // PRIMARY KEY
            $table->id();

            // DETAILS
            $table->string('school_year', 20);                          // 2025-2026
            $table->enum('semester', ['first', 'second', 'summer']);    // first
            $table->boolean('is_active')->default(false);               // 1

            // Created at only
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_years');
    }
};
