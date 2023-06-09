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
        Schema::create('professeurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('photo');
            $table->string('CIN')->unique();
            $table->string('telephone');
            $table->string('adress');
            $table->string('email')->unique();
            $table->string('password')->invisible()->default(' ');
            $table->string('role')->default('professeur');
            $table->string('type')->default('perment');
            $table->float('prix_par_H');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professeurs');
    }
};
