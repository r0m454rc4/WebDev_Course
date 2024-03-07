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
        Schema::create('treballadors', function (Blueprint $table) {
            // Here I secify the fields I want to have.
            $table->id();
            $table->string('nom');
            $table->string('cognoms');
            $table->string('nif')->unique();
            $table->date('data_naixement');
            $table->char('sexe',1);
            $table->string('adressa');
            $table->integer('tlf_fixe');
            $table->integer('tlf_mobil');
            $table->string('email');
            $table->binary('fotografia')->nullable();
            $table->boolean('treball_distancia');
            $table->enum('tipus_contracte',['temporal','indefinit','en formació','en pràctiques']);
            $table->date('data_contractacio');
            $table->tinyinteger('categoria');
            $table->string('nom_feina',30);
            $table->float('sou');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treballadors');
    }
};
