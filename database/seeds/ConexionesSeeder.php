<?php

use Faker\Factory;
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
        $faker = Factory::create();
        //
        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 1,
            'id_to' => 2,
            'peso_arista' => 8,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 1,
            'id_to' => 3,
            'peso_arista' => 16,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 1,
            'id_to' => 4,
            'peso_arista' => 18,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 2,
            'id_to' => 3,
            'peso_arista' => 6,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 2,
            'id_to' => 5,
            'peso_arista' => 14,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 3,
            'id_to' => 4,
            'peso_arista' => 8,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 3,
            'id_to' => 6,
            'peso_arista' => 12,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 4,
            'id_to' => 6,
            'peso_arista' => 16,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 5,
            'id_to' => 6,
            'peso_arista' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 5,
            'id_to' => 7,
            'peso_arista' => 12,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        \DB::table('conexiones')
        ->insert(array(
            'id_from' => 6,
            'id_to' => 7,
            'peso_arista' => 6,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));

        // \DB::table('conexiones')
        // ->insert(array(
        //     'id_from' => 5,
        //     'id_to' => 10,
        //     'peso_arista' => $faker->numberBetween(1,8),
        //     'created_at' => date('Y-m-d H:m:s'),
        //     'updated_at' => date('Y-m-d H:m:s')
        // ));

        // \DB::table('conexiones')
        // ->insert(array(
        //     'id_from' => 6,
        //     'id_to' => 7,
        //     'peso_arista' => $faker->numberBetween(1,8),
        //     'created_at' => date('Y-m-d H:m:s'),
        //     'updated_at' => date('Y-m-d H:m:s')
        // ));

        // \DB::table('conexiones')
        // ->insert(array(
        //     'id_from' => 6,
        //     'id_to' => 8,
        //     'peso_arista' => $faker->numberBetween(1,8),
        //     'created_at' => date('Y-m-d H:m:s'),
        //     'updated_at' => date('Y-m-d H:m:s')
        // ));

        // \DB::table('conexiones')
        // ->insert(array(
        //     'id_from' => 6,
        //     'id_to' => 9,
        //     'peso_arista' => $faker->numberBetween(1,8),
        //     'created_at' => date('Y-m-d H:m:s'),
        //     'updated_at' => date('Y-m-d H:m:s')
        // ));

        // \DB::table('conexiones')
        // ->insert(array(
        //     'id_from' => 7,
        //     'id_to' => 9,
        //     'peso_arista' => $faker->numberBetween(1,8),
        //     'created_at' => date('Y-m-d H:m:s'),
        //     'updated_at' => date('Y-m-d H:m:s')
        // ));

        // \DB::table('conexiones')
        // ->insert(array(
        //     'id_from' => 8,
        //     'id_to' => 10,
        //     'peso_arista' => $faker->numberBetween(1,8),
        //     'created_at' => date('Y-m-d H:m:s'),
        //     'updated_at' => date('Y-m-d H:m:s')
        // ));

        // \DB::table('conexiones')
        // ->insert(array(
        //     'id_from' => 9,
        //     'id_to' => 10,
        //     'peso_arista' => $faker->numberBetween(1,8),
        //     'created_at' => date('Y-m-d H:m:s'),
        //     'updated_at' => date('Y-m-d H:m:s')
        // ));
    }
}
