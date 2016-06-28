<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActualizarTablaMiembrosCargos1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('miembrosCargos', function (Blueprint $table) {
            $table->dropColumn('idMiembro');

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
            $table->integer('idMiembro')->unsigned()->change();
        });
    }
}
