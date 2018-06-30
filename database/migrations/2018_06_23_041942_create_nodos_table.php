<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatenodosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nodos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_nodo');
            $table->string('url_imagen'); //Se metió esta variable nueva
            $table->integer('id_proyecto')->unsigned(); //Se metió esta variable nueva
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_proyecto')->references('id')->on('proyectos'); //Se agregó una llave foranea
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nodos');
    }
}
