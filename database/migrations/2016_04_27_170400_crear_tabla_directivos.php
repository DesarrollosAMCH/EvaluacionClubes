<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDirectivos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directivos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rut',20)->nullable();
            $table->string('nombre',255);
            $table->string('email',255);
            $table->string('fono',20);
            $table->integer('edad');
            $table->integer('idRango');
            $table->integer('idClub');
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
        Schema::drop('directivos');
    }
}
