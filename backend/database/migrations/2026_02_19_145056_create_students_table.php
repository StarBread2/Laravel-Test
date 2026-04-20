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
        Schema::create('students', function (Blueprint $table) {
            
            $table->id(); 
            $table->bigInteger('student_number')->nullable()->unique()->index();

            // NAME
            $table->string('first_name', 100);
            $table->string('middle_name', 100)->nullable();
            $table->string('last_name', 100);
            $table->string('suffix_name', 50)->nullable();

            // PERSON DETAILS
            $table->enum('gender', ['M', 'F']);
            $table->date('birth_date');

            // CONTACTS
            $table->string('email', 150)->unique();
            $table->string('contact_number', 20);

            // FOREIGN KEY
            $table->foreignId('course_id')
                ->constrained('courses')
                ->restrictOnDelete();

            // created at and updated at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
