<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaAssinaturaTransacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assinaturaTransacoes', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('idTransacao')->unsigned();
            $table->integer('idAssinatura')->unsigned();
            $table->double('valorAssinatura');
            $table->dateTime('dataVencimento');
            $table->boolean('pago')->default(false);

            $table->timestamps();
        });

        Schema::table('assinaturaTransacoes', function(Blueprint $table){
            $table->foreign('idTransacao')->references('id')->on('transacoes');
            $table->foreign('idAssinatura')->references('id')->on('assinaturas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assinaturaTransacoes', function(Blueprint $table) {
            $table->dropForeign(['idTransacao']);
            $table->dropForeign(['idAssinatura']);
        });
        Schema::drop('assinaturaTransacoes');
    }
}
