<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateconexionesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conexiones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_from');
            $table->integer('id_to');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_from')->references('id')->on('nodos');
            $table->foreign('id_to')->references('id')->on('nodos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('conexiones');
    }
}
