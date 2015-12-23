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
        Schema::table('pagamentos', function(Blueprint $table)
        {
            $table->integer('idAssinatura')->unsigned();
            $table->integer('idTransacao')->unsigned();
            $table->date('validade')->nullable();
            $table->boolean('isPaid')->default(false);
        });

        Schema::table('pagamentos', function(Blueprint $table){
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
        Schema::table('pagamentos', function(Blueprint $table) {
            $table->dropForeign(['idTransacao']);
            $table->dropForeign(['idAssinatura']);

        });

        Schema::table('pagamentos', function(Blueprint $table) {

            $table->dropColumn('idAssinatura');
            $table->dropColumn('idTransacao');
            $table->dropColumn('validade');
            $table->dropColumn('isPaid');
        });
    }
}
