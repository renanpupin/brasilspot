<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ServicoEmpresa extends Migration
{

    public function up()
    {
        Schema::create('ServicosEmpresas', function(Blueprint $table)
        {
            $table->integer('idEmpresa')->unsigned();
            $table->integer('idServico')->unsigned();
            $table->timestamps();
        });

        Schema::table('ServicosEmpresas', function($table)
        {
            $table->foreign('idEmpresa')->references('id')->on('Empresas');
            $table->foreign('idServico')->references('id')->on('Servicos');
        });
    }

    public function down()
    {
        Schema::drop('ServicosEmpresas');
    }
}
