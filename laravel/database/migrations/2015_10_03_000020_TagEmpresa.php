<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TagEmpresa extends Migration
{

    public function up()
    {
        Schema::create('TagsEmpresas', function(Blueprint $table)
        {
            $table->integer('idEmpresa')->unsigned();
            $table->integer('idTag')->unsigned();
            $table->timestamps();
        });

        Schema::table('TagsEmpresas', function($table)
        {
            $table->foreign('idEmpresa')->references('id')->on('Empresas');
            $table->foreign('idTag')->references('id')->on('Tags');
        });
    }


    public function down()
    {
        Schema::drop('TagsEmpresas');
    }
}
