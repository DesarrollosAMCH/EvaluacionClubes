<?php

use Illuminate\Database\Seeder;

class CategoriasRequisitosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoriasRequisitos')->truncate();

        DB::table('categoriasRequisitos')->insert([
            'id'        =>  1,
            'nombre'    =>  'Secretaria',
        ]);

        DB::table('categoriasRequisitos')->insert([
            'id'        =>  2,
            'nombre'    =>  'Relacionamiento',
        ]);

        DB::table('categoriasRequisitos')->insert([
            'id'        =>  3,
            'nombre'    =>  'Misión',
        ]);
    }
}
