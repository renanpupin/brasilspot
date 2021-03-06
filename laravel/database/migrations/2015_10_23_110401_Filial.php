<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Filial extends Migration
{
    public function up()
    {
        Schema::create('filiais', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('idEmpresa')->unsigned();
            $table->integer('idEndereco')->unsigned();
            $table->integer('idTelefone')->unsigned();
            $table->integer('idWhatsApp')->unsigned()->nullable();
            $table->boolean('isPrincipal')->default(true);
            $table->timestamps();
        });

        Schema::table('filiais', function($table)
        {
            $table->foreign('idEmpresa')->references('id')->on('empresas');
            $table->foreign('idEndereco')->references('id')->on('enderecos');
            $table->foreign('idTelefone')->references('id')->on('telefones');
            $table->foreign('idWhatsApp')->references('id')->on('whatsApp');
        });
    }

    public function down()
    {
        Schema::table('filiais', function(Blueprint $table) {
            $table->dropForeign(['idEmpresa']);
            $table->dropForeign(['idEndereco']);
            $table->dropForeign(['idTelefone']);
            $table->dropForeign(['idWhatsApp']);
        });
        Schema::drop('filiais');
    }
}
