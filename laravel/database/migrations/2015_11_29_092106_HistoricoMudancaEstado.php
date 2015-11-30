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
            $table->foreign('fkEstadoTransacaoNovo')->references('idEstadoTransacao')->on('estadotransacao');
            $table->foreign('fkEstadoTransacaoVelho')->references('idEstadoTransacao')->on('estadotransacao');
        });
    }

    public function down()
    {
        Schema::table('historicomudancaestado', function(Blueprint $table) {
            $table->dropForeign(['fkTransacao']);
            $table->dropForeign(['fkEstadoTransacaoNovo']);
            $table->dropForeign(['fkEstadoTransacaoVelho']);
        });
        Schema::drop('historicomudancaestado');
    }
}
