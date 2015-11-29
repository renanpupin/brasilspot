<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TagEmpresa extends Migration
{

    public function up()
    {
        Schema::create('tagsEmpresas', function(Blueprint $table)
        {
            $table->integer('idEmpresa')->unsigned();
            $table->integer('idTag')->unsigned();
            $table->timestamps();
        });

        Schema::table('tagsEmpresas', function($table)
        {
            $table->foreign('idEmpresa')->references('id')->on('empresas');
            $table->foreign('idTag')->references('id')->on('tags');
        });
    }


    public function down()
    {
        Schema::table('tagsEmpresas', function(Blueprint $table) {
            $table->dropForeign(['idEmpresa']);
            $table->dropForeign(['idTag']);

        });
        Schema::drop('tagsEmpresas');
    }
}
