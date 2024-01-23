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
        Schema::create('agenda', function (Blueprint $table) {
            $table->id();
            $table->foreignId('crenau1')->constrained('crenaux')->nullable();
            $table->foreignId('crenau2')->constrained('crenaux')->nullable();
            $table->foreignId('crenau3')->constrained('crenaux')->nullable();
            $table->foreignId('crenau4')->constrained('crenaux')->nullable();
            $table->foreignId('crenau5')->constrained('crenaux')->nullable();
           $table->date('date');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda');
    }
};
