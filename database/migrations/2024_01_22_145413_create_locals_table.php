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

                $table->enum('Type_local', ['amphi', 'salle', 'salle conference']);

                $table->foreignId('departement_id')->nullable()->constrained('departements');

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
