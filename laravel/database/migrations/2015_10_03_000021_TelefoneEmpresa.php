<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TelefoneEmpresa extends Migration
{

    public function up()
    {
        Schema::create('TelefonesEmpresas', function(Blueprint $table)
        {
            $table->integer('idEmpresa')->unsigned();
            $table->integer('idTelefone')->unsigned();
            $table->timestamps();
        });

        Schema::table('TelefonesEmpresas', function($table)
        {
            $table->foreign('idEmpresa')->references('id')->on('Empresas');
            $table->foreign('idTelefone')->references('id')->on('Telefones');
        });
    }


    public function down()
    {
        Schema::drop('TelefonesEmpresas');
    }
}
