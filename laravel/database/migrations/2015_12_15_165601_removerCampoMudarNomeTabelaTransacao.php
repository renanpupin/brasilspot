<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoverCampoMudarNomeTabelaTransacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transacao', function (Blueprint $table) {
            $table->dropForeign(['fkCartao']);
            $table->dropColumn('fkCartao');

            $table->renameColumn('idTransacao','id');
            $table->renameColumn('fkEmpresa','idEmpresa');
            $table->renameColumn('fkTipoTransacao','idTipoTransacao');
            $table->renameColumn('fkEstadoTransacao','idEstadoTransacao');
        });

        Schema::rename('transacao', 'transacoes');


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('transacoes', 'transacao');

        Schema::table('transacao', function (Blueprint $table) {
            $table->integer('fkCartao')->unsigned();
            $table->foreign('fkCartao')->references('id')->on('cartoes');

            $table->renameColumn('id','idTransacao');
            $table->renameColumn('idEmpresa','fkEmpresa');
            $table->renameColumn('idTipoTransacao','fkTipoTransacao');
            $table->renameColumn('idEstadoTransacao','fkEstadoTransacao');

        });
    }
}
