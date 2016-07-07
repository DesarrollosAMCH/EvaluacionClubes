<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActualizarTablaRequisitosRealizados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requisitosRealizados', function (Blueprint $table) {
            $table->string('fecha',15)->nullable()->after('contenido');
            $table->string('lugar',255)->nullable()->after('contenido');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requisitosRealizados', function (Blueprint $table) {
            $table->dropColumn('fecha');
            $table->dropColumn('lugar');
        });
    }
}
