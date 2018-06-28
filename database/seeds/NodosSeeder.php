<?php

use Illuminate\Database\Seeder;

class NodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=1; $i <= 10; $i++) { 
            \DB::table('nodos')
            ->insert(array(
                'nombre_nodo' => ('Nodo '.$i),
                'url_imagen' => 'img/icono-edificios.png', //Se agregó este dato a el seed
                'id_proyecto' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));
        }
    }
}
