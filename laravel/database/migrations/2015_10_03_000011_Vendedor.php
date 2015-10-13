<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vendedor extends Migration
{

    public function up()
    {
        Schema::create('Vendedores', function(Blueprint $table)
        {
            $table->increments('Id');
            $table->boolean('IsCoordenador')->default(false);;
            $table->integer('IdUsuario')->unsigned();
            $table->integer('IdTipo')->unsigned();
            $table->integer('IdMeta')->unsigned();
            $table->integer('IdVendedorPai');
            $table->timestamps();
        });

        Schema::table('Vendedores', function($table)
        {
            $table->foreign('IdUsuario')->references('Id')->on('Usuarios');
            $table->foreign('IdTipo')->references('Id')->on('TiposVendedores');
            $table->foreign('IdMeta')->references('Id')->on('Metas');

        });
    }


    public function down()
    {
        Schema::drop('Vendedores');
    }
}
