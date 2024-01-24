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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            
            $table->enum('start_time', ["9","11","13","15","17"]);
            $table->integer('day');
            $table->integer('month');
            $table->integer('year');
            
            $table->string('Titre_reservation');
            $table->string('sujet_reservation');

            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('local_id')->constrained('locals');
            $table->foreignId('classes_id')->nullable()->constrained('classes'); // class mean group where student are registed , doesnt mean local 
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
