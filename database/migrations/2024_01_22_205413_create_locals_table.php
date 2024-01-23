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
            Schema::create('locals', function (Blueprint $table) {
                $table->id();
                $table->string('Code_local')->unique();
                $table->string('Nom_local');
                $table->boolean('Reserve');
                $table->enum('Type_local', ['amphi', 'salle', 'salle_conference']);
                $table->unsignedSmallInteger('reservation_id')->nullable();
                $table->unsignedSmallInteger('departement_id')->nullable();
    
                $table->foreign('reservation_id')->references('reservation_id')->on('reservations');
                $table->foreign('departement_id')->references('departement_id')->on('departements');
    
                $table->timestamps();
            });



        }
    
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locals');
    }
};
