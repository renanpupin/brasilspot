<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Filial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filiais', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('idEmpresa')->unsigned();
            $table->integer('idEndereco')->unsigned();
            $table->integer('idTelefone')->unsigned();
            $table->integer('idWhatsApp')->unsigned()->nullable();
            $table->boolean('isPrincipal')->default(false);
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('filiais');
    }
}
