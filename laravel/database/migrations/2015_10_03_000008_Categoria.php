<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Categoria extends Migration
{

    public function up()
    {
        Schema::create('Categorias', function(Blueprint $table)
        {
            $table->increments('Id')->unsigned();
            $table->string('Nome', 100);
            $table->integer('IdCategoriaPai')->unsigned();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('Categorias');
    }
}
