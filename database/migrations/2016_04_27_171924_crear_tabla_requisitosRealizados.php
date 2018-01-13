<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaRequisitosRealizados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitosRealizados', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('contenido');
            $table->integer('puntaje_logrado');
            $table->integer('idRequisito')->unsigned();
            $table->integer('idClub')->unsigned();
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
        Schema::drop('requisitosRealizados');
    }
}
