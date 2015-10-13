<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoriaEmpresa extends Migration
{

    public function up()
    {
        Schema::create('CategoriasEmpresas', function(Blueprint $table)
        {
            $table->integer('IdEmpresa')->unsigned();
            $table->integer('IdCategoria')->unsigned();
            $table->foreign('IdEmpresa')->references('Id')->on('Empresas');
            $table->foreign('IdCategoria')->references('Id')->on('Categorias');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('CategoriasEmpresas');
    }
}
