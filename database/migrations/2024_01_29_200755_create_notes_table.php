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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->float('CC1')->nullable();
            $table->float('CC2')->nullable();
            $table->float('Ratt')->nullable();
            $table->foreignId('etudiants_id')->constrained('etudiants')->onDelete('cascade'); 
            $table->foreignId('modules_id')->constrained('modules')->onDelete('cascade'); 
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
