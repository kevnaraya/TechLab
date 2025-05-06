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
        Schema::create('direccion', function (Blueprint $table) {
            $table->id('id_direccion');
            $table->string('direccion_exacta', 255);
            $table->string('detalle_envio', 255);
            $table->unsignedBigInteger('fk_id_estado');
            $table->timestamps();
            $table->foreign('fk_id_estado')->references('id_estado')->on('estados');
        });

        Schema::create('provincia', function (Blueprint $table) {
            $table->id('id_provincia');
            $table->string('nombre_provincia', 255);
            $table->unsignedBigInteger('fk_id_direccion');
            $table->timestamps();
            $table->foreign('fk_id_direccion')->references('id_direccion')->on('direccion');
        });

        Schema::create('canton', function (Blueprint $table) {
            $table->id('id_canton');
            $table->string('nombre_canton', 255);
            $table->unsignedBigInteger('fk_id_provincia');
            $table->timestamps();
            $table->foreign('fk_id_provincia')->references('id_provincia')->on('provincia');
        });

        Schema::create('distrito', function (Blueprint $table) {
            $table->id('id_distrito');
            $table->string('nombre_distrito', 255);
            $table->unsignedBigInteger('fk_id_canton');
            $table->timestamps();
            $table->foreign('fk_id_canton')->references('id_canton')->on('canton');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distrito');
        Schema::dropIfExists('canton');
        Schema::dropIfExists('provincia');
        Schema::dropIfExists('direccion');
    }
};
