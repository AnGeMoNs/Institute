<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSucursalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sucursal', function (Blueprint $table) {
            $table->id('idSucursal');
            $table->string('Nombre_S');
            $table->unsignedBigInteger('Ubicacion1');
            $table->timestamps();

            $table->foreign('Ubicacion1')->references('idUbicacion')->on('Ubicacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Sucursal');
    }
}
