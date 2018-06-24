<?php

use Illuminate\Database\Seeder;

class ConexionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 1,
            'id_to' => 2,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 1,
            'id_to' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 2,
            'id_to' => 5,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 2,
            'id_to' => 4,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 3,
            'id_to' => 4,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 3,
            'id_to' => 7,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 4,
            'id_to' => 5,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 4,
            'id_to' => 6,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 4,
            'id_to' => 7,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 5,
            'id_to' => 6,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 5,
            'id_to' => 8,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 5,
            'id_to' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 6,
            'id_to' => 7,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 6,
            'id_to' => 8,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 6,
            'id_to' => 9,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 7,
            'id_to' => 9,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 8,
            'id_to' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 9,
            'id_to' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));
    }
}
