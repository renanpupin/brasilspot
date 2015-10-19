<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FotoEmpresa extends Migration
{

    public function up()
    {
        Schema::create('FotosEmpresas', function(Blueprint $table)
        {
            $table->integer('idEmpresa')->unsigned();
            $table->integer('idFoto')->unsigned();
            $table->boolean('destaque')->default(false);
            $table->timestamps();
        });

        Schema::table('FotosEmpresas', function($table){
            $table->foreign('idEmpresa')->references('id')->on('Empresas');
            $table->foreign('idFoto')->references('id')->on('Fotos');
        });
    }

    public function down()
    {
        Schema::drop('FotosEmpresas');
    }
}
