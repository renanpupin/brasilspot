<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoverColunaHistoricoTransacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('historicomudancaestado', function(Blueprint $table) {
            $table->dropForeign(['fkEstadoTransacaoVelho']);
        });

        Schema::table('historicomudancaestado', function(Blueprint $table)
        {
            $table->dropColumn('fkEstadoTransacaoVelho');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('historicomudancaestado', function(Blueprint $table)
        {
            $table->integer('fkEstadoTransacaoVelho')->unsigned();
        });

        Schema::table('historicomudancaestado', function(Blueprint $table){
            $table->foreign('fkEstadoTransacaoVelho')->references('idEstadoTransacao')->on('estadotransacao');
        });
    }
}
