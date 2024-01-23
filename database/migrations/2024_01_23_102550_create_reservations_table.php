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

            $table->string('Titre_reservation');
            $table->string('sujet_reservation');
            $table->string('start_time');
            
            $table->foreignId('reserve_par')->constrained('users');
            $table->foreignId('local_id')->constrained('locals');
            $table->foreignId('creneau_id')->constrained('creneaux');
    
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
