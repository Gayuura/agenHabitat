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
        Schema::create('logements', function (Blueprint $table) {
            $table->id();
            $table->date('date_rapport');
            $table->string('adresse_logement');
            $table->string('type_logement');
            $table->smallInteger('nombre_pieces');
            $table->smallInteger('superficie_m2');
            $table->smallInteger('etage');
            $table->string('toiture');
            $table->string('type_chauffage');
            $table->year('annee_construction');
            $table->string('classe_energetique');
            $table->boolean('conformite_R2_2020');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logements');
    }
};
