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
        Schema::create('missions', function (Blueprint $table) {
            $table->id('idMission');
            $table->string('libelle')->notNull();
            $table->date('dateDepart')->notNull();
            $table->date('dateArrivee')->notNull();
            $table->string('lieuDepart')->notNull();
            $table->string('lieuArrivee')->notNull();
            $table->unsignedBigInteger('idConducteurMission')->notNull();
            $table->unsignedBigInteger('idVehiculeMission')->notNull();
            $table->foreign('idConducteurMission')->references('idConducteur')->on('drivers')->onDelete('restrict');
            $table->foreign('idVehiculeMission')->references('idVehicule')->on('cars')->onDelete('restrict');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('missions');
    }
};
