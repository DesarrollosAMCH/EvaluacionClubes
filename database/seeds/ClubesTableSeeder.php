<?php

use Illuminate\Database\Seeder;

class ClubesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clubes')->truncate();

        DB::table('clubes')->insert([
            'id'        =>  1,
            'nombre'    =>  'Regional AMCH',
            'logo'      =>  '',
            'foto'      =>  '',
            'idZona'    =>  '',
            'idCampo'   =>  '1'
        ]);

        DB::table('clubes')->insert([
            'id'        =>  2,
            'nombre'    =>  'Rejas Sur',
            'logo'      =>  '',
            'foto'      =>  '',
            'idZona'    =>  '1',
            'idCampo'   =>  '1'
        ]);

        DB::table('clubes')->insert([
            'id'        =>  3,
            'nombre'    =>  'Ararat',
            'logo'      =>  '',
            'foto'      =>  '',
            'idZona'    =>  '1',
            'idCampo'   =>  '1'
        ]);

        DB::table('clubes')->insert([
            'id'        =>  4,
            'nombre'    =>  'K2',
            'logo'      =>  '',
            'foto'      =>  '',
            'idZona'    =>  '1',
            'idCampo'   =>  '1'
        ]);
    }
}
