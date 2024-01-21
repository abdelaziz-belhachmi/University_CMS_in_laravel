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
        Schema::create('_chef_filieres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); 

            $table->string('code_Chef')->unique();
            $table->date('date_integration')->nullable(true);

            $table->foreignId('filieres_id')->constrained(); // Foreign key to link to the filieres table

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_chef_filieres');
    }
};
