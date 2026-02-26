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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();

            //FOREIGN buildings
            $table->foreignId('building_id')
                ->constrained('buildings')
                ->restrictOnDelete();               // {buildings.building_code, building_name}

            $table->string('room_number', 20);      // 104

            $table->enum('room_type', [
                'lecture',
                'lab',
                'office'
            ])->default('lecture');                 // enum lecture (what type of room)

            $table->integer('capacity');            // 40

            $table->timestamps();                   //timestamps

            $table->unique(['building_id', 'room_number']);     //unique room number per building
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
