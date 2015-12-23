<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoverCampoMudarNomeTabelaTransacao extends Migration
{
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::table('historicomudancaestado', function(Blueprint $table) {
            $table->dropForeign(['fkTransacao']);
        });

        Schema::table('transacao', function(Blueprint $table) {
            $table->dropForeign(['fkEmpresa']);
            $table->dropForeign(['fkCartao']);
            $table->dropForeign(['fkTipoTransacao']);
            $table->dropForeign(['fkEstadoTransacao']);
        });
        Schema::drop('transacao');


        Schema::create('transacoes', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('idUsuario')->unsigned();
            $table->integer('idTipoTransacao')->unsigned();
            $table->integer('idEstadoTransacao')->unsigned();
            $table->double('valorBruto');
            $table->string('cardHashMensal')->nullable;
            $table->string('cardHash')->nullable();
            $table->timestamps();
        });

        Schema::table('transacoes', function(Blueprint $table){
            $table->foreign('idUsuario')->references('id')->on('users');
            $table->foreign('idTipoTransacao')->references('idTipoTransacao')->on('tipotransacao');
            $table->foreign('idEstadoTransacao')->references('idEstadoTransacao')->on('estadotransacao');
        });

        Schema::table('historicomudancaestado', function(Blueprint $table){
            $table->foreign('fkTransacao')->references('id')->on('transacoes');
        });
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }

    public function down()
    {
        Schema::table('historicomudancaestado', function(Blueprint $table) {
            $table->dropForeign(['fkTransacao']);
        });

        Schema::table('transacoes', function(Blueprint $table) {
            $table->dropForeign(['idUsuario']);
            $table->dropForeign(['idTipoTransacao']);
            $table->dropForeign(['idEstadoTransacao']);
        });

        Schema::drop('transacoes');

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

        Schema::table('transacao', function(Blueprint $table)
        {
            $table->foreign('fkEmpresa')->references('id')->on('empresas');
            $table->foreign('fkCartao')->references('id')->on('cartoes');
            $table->foreign('fkTipoTransacao')->references('idTipoTransacao')->on('tipotransacao');
            $table->foreign('fkEstadoTransacao')->references('idEstadoTransacao')->on('estadotransacao');
        });

        Schema::table('historicomudancaestado', function(Blueprint $table){
            $table->foreign('fkTransacao')->references('idTransacao')->on('transacao');
        });
    }
}
