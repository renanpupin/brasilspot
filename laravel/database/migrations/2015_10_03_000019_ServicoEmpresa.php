<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ServicoEmpresa extends Migration
{

    public function up()
    {
        Schema::create('servicosEmpresas', function(Blueprint $table)
        {
            $table->integer('idEmpresa')->unsigned();
            $table->integer('idServico')->unsigned();
            $table->timestamps();
        });

        Schema::table('servicosEmpresas', function($table)
        {
            $table->foreign('idEmpresa')->references('id')->on('empresas');
            $table->foreign('idServico')->references('id')->on('servicos');
        });
    }

    public function down()
    {
        Schema::drop('servicosEmpresas');
    }
}
