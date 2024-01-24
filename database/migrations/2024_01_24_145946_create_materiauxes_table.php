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
        Schema::create('materiauxes', function (Blueprint $table) {
            $table->id();
            $table->string('nom_materiel');
            $table->enum('etat',['fonctionnel','en panne']);
            $table->string('categorie_materiel');
            $table->foreignId('local_id')->constrained('locals');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiauxes');
    }
};
