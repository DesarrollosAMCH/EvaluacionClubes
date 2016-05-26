<?php

use Illuminate\Database\Seeder;

class CamposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campos')->truncate();

        DB::table('campos')->insert([
            'id'        =>  1,
            'nombre'    =>  'AMCH',
        ]);
    }
}
