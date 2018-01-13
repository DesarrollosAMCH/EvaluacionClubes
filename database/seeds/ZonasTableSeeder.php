<?php

use Illuminate\Database\Seeder;

class ZonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zonas')->truncate();

        DB::table('zonas')->insert([
            'id'        =>  1,
            'nombre'    =>  'Poniente',
            'campo'     =>  1
        ]);
    }
}
