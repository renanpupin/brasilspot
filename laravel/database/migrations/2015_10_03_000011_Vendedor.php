<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vendedor extends Migration
{

    public function up()
    {
        Schema::create('Vendedores', function(Blueprint $table)
        {
            $table->increments('id');
            $table->boolean('isCoordenador')->default(false);;
            $table->integer('idUsuario')->unsigned();
            $table->integer('idTipo')->unsigned();
            $table->integer('idMeta')->unsigned();
            $table->integer('idVendedorPai');
            $table->timestamps();
        });

        Schema::table('Vendedores', function($table)
        {
            $table->foreign('idUsuario')->references('id')->on('Usuarios');
            $table->foreign('idTipo')->references('id')->on('TiposVendedores');
            $table->foreign('idMeta')->references('id')->on('Metas');

        });
    }


    public function down()
    {
        Schema::drop('Vendedores');
    }
}
