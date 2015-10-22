<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Categoria extends Migration
{

    public function up()
    {
        Schema::create('Categorias', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('nome', 100);
            $table->integer('idCategoriaPai')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('Categorias', function($table)
        {
            $table->foreign('idCategoriaPai')->references('id')->on('Categorias');
        });
    }


    public function down()
    {
        Schema::drop('Categorias');
    }
}
