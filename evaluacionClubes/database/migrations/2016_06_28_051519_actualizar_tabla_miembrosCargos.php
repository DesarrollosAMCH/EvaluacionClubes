<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActualizarTablaMiembrosCargos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('miembrosCargos', function (Blueprint $table) {
            $table->dropColumn('idDirectivo');
            $table->integer('idMiembro')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('miembrosCargos', function (Blueprint $table) {
            $table->dropColumn('idMiembro');
            $table->integer('idDirectivo')->unsigned();
        });
    }
}
