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
        Schema::create('audiences', function (Blueprint $table) {
            $table->id();

            $table->boolean('visiteur')->default(false);
            $table->boolean('etudiants')->default(false);
            $table->boolean('professeurs')->default(false);
            $table->boolean('chef_departement')->default(false);
            $table->boolean('chef_filliere')->default(false);
            $table->boolean('chef_service')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audiences');
    }
};
