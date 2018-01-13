<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateClubesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('idClub');
        });
        Schema::table('clubes', function (Blueprint $table) {
            $table->integer('idUsuario')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('idClub')->unsigned()->nullable();
        });
        Schema::table('clubes', function (Blueprint $table) {
            $table->dropColumn('idUsuario');
        });
    }
}
