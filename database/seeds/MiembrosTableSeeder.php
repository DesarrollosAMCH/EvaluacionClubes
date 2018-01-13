<?php

use Illuminate\Database\Seeder;

class MiembrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('miembros')->truncate();

        DB::table('miembros')->insert([
            'id'        =>  1,
            'rut'       =>  '17390878-4',
            'nombre'    =>  'Nicolás Fredes',
            'email'     =>  'niko.afv@gmail.com',
            'idClub'    =>  '1'
        ]);
    }
}
