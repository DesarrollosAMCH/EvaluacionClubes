<?php

use Illuminate\Database\Seeder;

class CargosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargos')->truncate();

        DB::table('cargos')->insert([
            'id'        =>  1,
            'nombre'    =>  'Director',
        ]);

        DB::table('cargos')->insert([
            'id'        =>  2,
            'nombre'    =>  'Subirector',
        ]);

        DB::table('cargos')->insert([
            'id'        =>  3,
            'nombre'    =>  'Capellán',
        ]);

        DB::table('cargos')->insert([
            'id'        =>  4,
            'nombre'    =>  'Secrtario',
        ]);

        DB::table('cargos')->insert([
            'id'        =>  5,
            'nombre'    =>  'Tesorero',
        ]);

        DB::table('cargos')->insert([
            'id'        =>  6,
            'nombre'    =>  'Instructor',
        ]);
    }
}
