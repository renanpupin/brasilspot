<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoriaEmpresa extends Migration
{

    public function up()
    {
        Schema::create('categoriasEmpresas', function(Blueprint $table)
        {
            $table->integer('idEmpresa')->unsigned();
            $table->integer('idCategoria')->unsigned();
            $table->timestamps();
        });

        Schema::table('categoriasEmpresas', function($table)
        {
            $table->foreign('idEmpresa')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('idCategoria')->references('id')->on('categorias');
        });
    }


    public function down()
    {
        Schema::drop('categoriasEmpresas');
    }
}
