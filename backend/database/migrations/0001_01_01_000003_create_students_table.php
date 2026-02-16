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
            $table->id(); // id, bigint, auto_increment, primary key
            $table->string('student_number', 255); // varchar(255)
            $table->string('first_name', 255);     
            $table->string('last_name', 255);      
            $table->string('email', 255);          
            $table->string('course', 255);         
            $table->integer('year_level');         // int
            $table->date('birth_date')->nullable(); // date, nullable
            $table->timestamps();                   // created_at & updated_at timestamps, nullable by default
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
