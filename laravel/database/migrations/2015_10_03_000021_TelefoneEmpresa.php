<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TelefoneEmpresa extends Migration
{

    public function up()
    {
        Schema::create('telefonesEmpresas', function(Blueprint $table)
        {
            $table->integer('idEmpresa')->unsigned();
            $table->integer('idTelefone')->unsigned();
            $table->timestamps();
        });

        Schema::table('telefonesEmpresas', function($table)
        {
            $table->foreign('idEmpresa')->references('id')->on('empresas');
            $table->foreign('idTelefone')->references('id')->on('telefones');
        });
    }


    public function down()
    {
        Schema::drop('telefonesEmpresas');
    }
}
