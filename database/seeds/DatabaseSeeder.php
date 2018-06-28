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
        $this->call('Proyectos');
        $this->call('NodosSeeder');
        $this->call('ConexionesSeeder');
        $this->call('Users');
    }
}
