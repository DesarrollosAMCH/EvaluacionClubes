<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ZonasTableSeeder::class);
        $this->call(ClubesTableSeeder::class);
        $this->call(CargosTableSeeder::class);
        $this->call(MiembrosTableSeeder::class);
        $this->call(CategoriasRequisitosTableSeeder::class);
        $this->call(CamposTableSeeder::class);
    }
}
