<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTableHistorialAcciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historialAcciones', function (Blueprint $table) {
            $table->increments('id');
            $table->text('freezeEvaluacion');
            $table->integer('idUsuario')->unsignes();
            $table->integer('idTipoAccion')->unsignes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('historialAcciones');
    }
}
