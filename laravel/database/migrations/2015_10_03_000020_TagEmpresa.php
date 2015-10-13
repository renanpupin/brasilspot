<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TagEmpresa extends Migration
{

    public function up()
    {
        Schema::create('TagsEmpresas', function(Blueprint $table)
        {
            $table->integer('IdEmpresa')->unsigned();
            $table->integer('IdTag')->unsigned();
            $table->foreign('IdEmpresa')->references('Id')->on('Empresas');
            $table->foreign('IdTag')->references('Id')->on('Tags');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('TagsEmpresas');
    }
}
