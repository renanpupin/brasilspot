<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vendedor extends Migration
{

    public function up()
    {
        Schema::create('vendedores', function(Blueprint $table)
        {
            $table->increments('id');
            //$table->boolean('isCoordenador')->default(false);;
            $table->integer('idUsuario')->unsigned();
            $table->integer('idTipo')->unsigned();
            $table->integer('idMeta')->unsigned();
            $table->integer('idVendedorPai');
            $table->timestamps();
        });

        Schema::table('vendedores', function($table)
        {
            $table->foreign('idUsuario')->references('id')->on('users');
            $table->foreign('idTipo')->references('id')->on('tiposVendedores');
            $table->foreign('idMeta')->references('id')->on('metas');

        });
    }


    public function down()
    {
        Schema::table('vendedores', function(Blueprint $table) {
            $table->dropForeign(['idUsuario']);
            $table->dropForeign(['idTipo']);
            $table->dropForeign(['idMeta']);
        });
        Schema::drop('vendedores');
    }
}
