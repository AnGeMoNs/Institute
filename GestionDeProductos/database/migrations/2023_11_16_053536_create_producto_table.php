<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Producto', function (Blueprint $table) {
            $table->id('idProducto');
            $table->string('Codigo');
            $table->string('Nombre_P');
            $table->string('Descripcion');
            $table->integer('Cantidad');
            $table->integer('Precio');
            $table->unsignedBigInteger('idCategoria1');
            $table->unsignedBigInteger('idSucursal1');
            $table->unsignedBigInteger('Administrado_Por');
            $table->timestamps();

            $table->foreign('idCategoria1')->references('idCategoria')->on('Categoria');
            $table->foreign('idSucursal1')->references('idSucursal')->on('Sucursal');
            $table->foreign('Administrado_Por')->references('idAdministradores')->on('Administradores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Producto');
    }
}
