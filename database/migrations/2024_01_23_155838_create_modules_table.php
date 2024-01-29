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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('code_module')->unique();
            $table->string('nom_module');
            $table->string('description_module');
            $table->integer('semestre');
            $table->foreignId('filiere_id')->constrained('filieres');
            $table->foreignId('professeurs_id')->nullable()->constrained('professeurs');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
