<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HistoricoMudancaEstado extends Migration
{
    public function up()
    {
        Schema::create('historicomudancaestado', function(Blueprint $table)
        {
            $table->increments('idHistorico')->unsigned();
            $table->integer('fkTransacao')->unsigned();
            $table->integer('fkEstadoTransacaoNovo')->unsigned();
            $table->integer('fkEstadoTransacaoVelho')->unsigned();
            $table->timestamps();
        });

        Schema::table('historicomudancaestado', function(Blueprint $table){
            $table->foreign('fkTransacao')->references('idTransacao')->on('transacao');
            $table->foreign('fkEstadoTransacaoNovo')->references('idTipoEstadoTransacao')->on('tipoestadotransacao');
            $table->foreign('fkEstadoTransacaoVelho')->references('idTipoEstadoTransacao')->on('tipoestadotransacao');
        });
    }

    public function down()
    {
        Schema::drop('historicomudancaestado');
    }
}
