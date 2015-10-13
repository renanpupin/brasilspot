<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TelefoneEmpresa extends Migration
{

    public function up()
    {
        Schema::create('TelefonesEmpresas', function(Blueprint $table)
        {
            $table->integer('IdEmpresa')->unsigned();
            $table->integer('IdTelefone')->unsigned();
            $table->foreign('IdEmpresa')->references('Id')->on('Empresas');
            $table->foreign('IdTelefone')->references('Id')->on('Telefones');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('TelefonesEmpresas');
    }
}
