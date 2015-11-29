<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Categoria extends Migration
{

    public function up()
    {
        Schema::create('categorias', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('nome', 100);
            $table->integer('idCategoriaPai')->unsigned()->nullable();
            $table->string('slug',100);
            $table->timestamps();
        });

        Schema::table('categorias', function($table)
        {
            $table->foreign('idCategoriaPai')->references('id')->on('categorias');
        });
    }


    public function down()
    {
        Schema::drop('categorias');
    }
}
