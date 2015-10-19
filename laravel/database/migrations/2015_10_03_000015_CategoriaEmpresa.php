<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoriaEmpresa extends Migration
{

    public function up()
    {
        Schema::create('CategoriasEmpresas', function(Blueprint $table)
        {
            $table->integer('idEmpresa')->unsigned();
            $table->integer('idCategoria')->unsigned();
            $table->timestamps();
        });

        Schema::table('CategoriasEmpresas', function($table)
        {
            $table->foreign('idEmpresa')->references('id')->on('Empresas');
            $table->foreign('idCategoria')->references('id')->on('Categorias');
        });
    }


    public function down()
    {
        Schema::drop('CategoriasEmpresas');
    }
}
