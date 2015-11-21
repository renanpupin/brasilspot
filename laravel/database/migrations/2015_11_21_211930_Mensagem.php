<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mensagem extends Migration
{
    public function up()
    {
        Schema::create('mensagens', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('idUsuario')->unsigned();
            $table->string('rementente');
            $table->integer('idUsuarioDestino')->unsigned();
            $table->dateTime('dataEnvio');
            $table->dateTime('dataRespondida');
            $table->timestamps();
        });

        Schema::table('mensagens', function(Blueprint $table){
            $table->foreign('idUsuario')->references('id')->on('users');
            $table->foreign('idUsuarioDestino')->references('id')->on('users');
        });
    }


    public function down()
    {
        Schema::drop('mensagens');
    }
}
