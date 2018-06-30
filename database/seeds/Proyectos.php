<?php

use Illuminate\Database\Seeder;

class Proyectos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('proyectos')
        ->insert(array(
            'nombre_proyecto' => 'Proyecto Los activistas S.A',
            'descripcion' => 'Este es un proyecto de prueba creado por un Seeder de Laravel.',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));
    }
}
