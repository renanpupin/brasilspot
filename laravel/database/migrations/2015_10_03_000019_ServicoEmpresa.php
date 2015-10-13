<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ServicoEmpresa extends Migration
{

    public function up()
    {
        Schema::create('ServicosEmpresas', function(Blueprint $table)
        {
            $table->integer('IdEmpresa')->unsigned();
            $table->integer('IdServico')->unsigned();
            $table->foreign('IdEmpresa')->references('Id')->on('Empresas');
            $table->foreign('IdServico')->references('Id')->on('Servicos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('ServicosEmpresas');
    }
}
