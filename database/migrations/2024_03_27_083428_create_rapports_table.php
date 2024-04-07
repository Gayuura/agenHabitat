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
        Schema::create('rapports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inspection_id')->constrained()->onDelete('cascade');
            $table->string('nom_prenom');
            $table->date('date_entree');
            $table->string('tel_mobile')->nullable();
            $table->string('email')->nullable();
            $table->date('date_rapport');
            $table->string('adresse_logement');
            $table->string('type_logement');
            $table->integer('nombre_pieces');
            $table->float('superficie_m2');
            $table->integer('etage');
            $table->string('toiture')->nullable();
            $table->string('type_chauffage')->nullable();
            $table->string('annee_construction')->nullable();
            $table->string('classe_energetique')->nullable();
            $table->boolean('conformite_R2_2020')->nullable();
            $table->string('signature_locataire')->nullable();
            $table->string('signature_inspecteur')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapports');
    }
};