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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); 
            $table->string('type'); // in this column we can store the type of demande (e.g., lettre, rendez-vous, stage, etc.)
            $table->text('description')->nullable();
            $table->timestamps();
            //foreignId d prof w d chef service w chef filiere
            //foreign id avec table

            $table->foreignId('audience_id')->constrained('audiences')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
