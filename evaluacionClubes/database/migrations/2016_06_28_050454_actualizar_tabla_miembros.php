<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActualizarTablaMiembros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('miembros', function (Blueprint $table) {
            $table->dropColumn('edad');
            $table->date('fecha_nacimiento')->nullable()->after('fono');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('miembros', function (Blueprint $table) {
            $table->dropColumn('fecha_nacimiento');
            $table->integer('edad')->nullable()->after('fono');
        });
    }
}
