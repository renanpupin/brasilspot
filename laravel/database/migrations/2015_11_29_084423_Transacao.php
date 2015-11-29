<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Transacao extends Migration
{
    public function up()
    {
        Schema::create('transacao', function(Blueprint $table)
        {
            $table->increments('idTransacao')->unsigned();
            $table->integer('fkEmpresa')->unsigned();
            $table->integer('fkCartao')->unsigned();
            $table->integer('fkTipoTransacao')->unsigned();
            $table->integer('fkEstadoTransacao')->unsigned();
            $table->double('valorBruto');
            $table->string('cardHash');
            $table->dateTime('dataInicio');
            $table->dateTime('dataResposta');
            $table->timestamps();
        });

        Schema::table('transacao', function(Blueprint $table){
            $table->foreign('fkEmpresa')->references('id')->on('empresas');
            $table->foreign('fkCartao')->references('id')->on('cartoes');
            $table->foreign('fkTipoTransacao')->references('idTipoTransacao')->on('tipotransacao');
            $table->foreign('fkEstadoTransacao')->references('idEstadoTransacao')->on('estadotransacao');
        });
    }

    public function down()
    {
        Schema::drop('transacao');
    }
}
