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
        Schema::create('generos', function (Blueprint $table) {
            $table->id('id_genero');
            $table->string('nombre', 100)->unique();
            $table->string('descripcion', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('marcas', function (Blueprint $table) {
            $table->id('id_marca');
            $table->string('descripcion_marca', 255)->nullable();
            $table->string('imagen_marca', 100)->unique();
            $table->unsignedBigInteger('fk_id_estado');
            $table->timestamps();
            $table->foreign('fk_id_estado')->references('id_estado')->on('estados');
        });

        Schema::create('categoria_producto', function (Blueprint $table) {
            $table->id('id_categoria_prod');
            $table->string('nombre_categoria', 255);
            $table->string('descripcion_categoria', 255)->nullable();
            //$table->string('slug', 255)->unique();
            $table->unsignedBigInteger('fk_id_estado');
            $table->unsignedBigInteger('fk_id_genero');
            $table->timestamps();
            $table->foreign('fk_id_estado')->references('id_estado')->on('estados');
            $table->foreign('fk_id_genero')->references('id_genero')->on('generos');
        });

        Schema::create('subcategoria', function (Blueprint $table) {
            $table->id('id_subcategoria');
            $table->string('nombre_categoria', 255);
            $table->string('descripcion_categoria', 255)->nullable();
            //$table->string('slug', 255)->unique();
            $table->unsignedBigInteger('fk_id_estado');
            $table->unsignedBigInteger('fk_id_categoria_prod');
            $table->timestamps();
            $table->foreign('fk_id_estado')->references('id_estado')->on('estados');
            $table->foreign('fk_id_categoria_prod')->references('id_categoria_prod')->on('categoria_producto');
        });

        Schema::create('tallas', function (Blueprint $table) {
            $table->id('id_talla');
            $table->string('nombre', 20)->unique();
            $table->string('descripcion', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('nombre_producto', 255);
            $table->text('descripcion_producto')->nullable();
            $table->double('precio_costo_producto', 10, 2);
            $table->double('precio_venta_producto', 10, 2);
            $table->double('precio_por_mayor_producto', 10, 2);
            //$table->string('slug', 255)->unique();
            $table->unsignedBigInteger('fk_id_subcategoria');
            //$table->unsignedBigInteger('fk_id_proveedor');
            //$table->unsignedBigInteger('fk_id_marca');
            $table->unsignedBigInteger('fk_id_estado');
            $table->timestamps();
            $table->foreign('fk_id_subcategoria')->references('id_subcategoria')->on('subcategoria');
            //$table->foreign('fk_id_proveedor')->references('id_estado')->on('estados');
            //$table->foreign('fk_id_marca')->references('id_marca')->on('marcas');
            $table->foreign('fk_id_estado')->references('id_estado')->on('estados');
        });
        
        Schema::create('producto_tallas', function (Blueprint $table) {
            $table->id('id_producto_talla');
            $table->integer('cantidad');
            $table->unsignedBigInteger('fk_id_producto');
            $table->unsignedBigInteger('fk_id_talla');
            $table->timestamps();
            $table->foreign('fk_id_producto')->references('id_producto')->on('productos');
            $table->foreign('fk_id_talla')->references('id_talla')->on('tallas');
        });

        Schema::create('descuentos', function (Blueprint $table) {
            $table->id('id_descuento');
            $table->string('codigo_de_descuento', 255);
            $table->double('porcentaje_descuento', 5, 2);
            $table->string('descripcion_descuento', 255)->nullable();
            $table->unsignedBigInteger('fk_id_estado');
            $table->timestamps();
            $table->foreign('fk_id_estado')->references('id_estado')->on('estados');
        });

        Schema::create('pedidos', function (Blueprint $table) {
            $table->id('id_pedido');
            $table->date('fecha_pedido');
            $table->double('subtotal_pedido', 10, 2);
            $table->double('total_pedido', 10, 2);
            $table->string('detalle_pedido', 255)->nullable();
            $table->unsignedBigInteger('fk_id_usuario');
            $table->unsignedBigInteger('fk_id_descuento');
            $table->unsignedBigInteger('fk_id_metodo_de_pago');
            $table->unsignedBigInteger('fk_id_estado');
            $table->timestamps();
            $table->foreign('fk_id_usuario')->references('id')->on('users');
            $table->foreign('fk_id_descuento')->references('id_descuento')->on('descuentos');
            $table->foreign('fk_id_metodo_de_pago')->references('id_metodo_de_pago')->on('metodo_de_pago');
            $table->foreign('fk_id_estado')->references('id_estado')->on('estados');
        });

        Schema::create('detalle_pedido', function (Blueprint $table) {
            $table->id('id_detalle_pedido');
            $table->integer('cantidad');
            $table->double('subtotal', 10, 2);
            $table->string('detalle', 255)->nullable();
            $table->unsignedBigInteger('fk_id_pedido');
            $table->unsignedBigInteger('fk_id_producto_talla');
            $table->timestamps();
            $table->foreign('fk_id_pedido')->references('id_pedido')->on('pedidos');
            $table->foreign('fk_id_producto_talla')->references('id_producto_talla')->on('producto_tallas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_pedido');
        Schema::dropIfExists('pedidos');
        Schema::dropIfExists('descuentos');
        Schema::dropIfExists('producto_tallas');
        Schema::dropIfExists('productos');
        Schema::dropIfExists('tallas');
        Schema::dropIfExists('subcategoria');
        Schema::dropIfExists('categoria_producto');
        Schema::dropIfExists('marcas');
        Schema::dropIfExists('generos');
    }
};
