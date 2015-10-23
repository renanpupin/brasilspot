<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FotoEmpresa extends Migration
{

    public function up()
    {
        Schema::create('fotosEmpresas', function(Blueprint $table)
        {
            $table->integer('idEmpresa')->unsigned();
            $table->integer('idFoto')->unsigned();
            $table->boolean('destaque')->default(false);
            $table->timestamps();
        });

        Schema::table('fotosEmpresas', function($table){
            $table->foreign('idEmpresa')->references('id')->on('empresas');
            $table->foreign('idFoto')->references('id')->on('fotos');
        });
    }

    public function down()
    {
        Schema::drop('fotosEmpresas');
    }
}
