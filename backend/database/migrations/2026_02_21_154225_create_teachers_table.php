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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();

            // NAME
            $table->string('first_name', 100);
            $table->string('middle_name', 100)->nullable();
            $table->string('last_name', 100);
            $table->string('suffix_name', 50)->nullable();

            // PERSON DETAILS
            $table->string('email', 150)->unique();
            $table->string('contact_number', 20);

            $table->enum('employment_status', [
                'full-time',
                'part-time'
            ]);                                                 // full-time

            $table->foreignId('college_id')
                ->constrained('colleges')
                ->restrictOnDelete();                           // departments.college (CAS)

            // created at and updated at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
