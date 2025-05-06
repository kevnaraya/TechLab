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
        Schema::create('estados', function (Blueprint $table) {
            $table->id('id_estado');
            $table->string('detalle_estado', 100)->unique();
            $table->timestamps();
        });

        Schema::create('metodo_de_pago', function (Blueprint $table) {
            $table->id('id_metodo_de_pago');
            $table->string('detalle_metodo_de_pago', 100);
            $table->unsignedBigInteger('fk_id_estado');
            $table->timestamps();
            $table->foreign('fk_id_estado')->references('id_estado')->on('estados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('esenciales_tablas');
    }
};
