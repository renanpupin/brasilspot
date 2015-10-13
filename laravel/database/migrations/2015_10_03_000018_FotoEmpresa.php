<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FotoEmpresa extends Migration
{

    public function up()
    {
        Schema::create('FotosEmpresas', function(Blueprint $table)
        {
            $table->integer('IdEmpresa')->unsigned();
            $table->integer('IdFoto')->unsigned();
            $table->boolean('Destaque')->default(false);
            $table->timestamps();
        });

        Schema::table('FotosEmpresas', function($table){
            $table->foreign('IdEmpresa')->references('Id')->on('Empresas');
            $table->foreign('IdFoto')->references('Id')->on('Fotos');
        });
    }

    public function down()
    {
        Schema::drop('FotosEmpresas');
    }
}
