<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuario extends Migration
{

    public function up()
    {
        Schema::create('Usuarios', function(Blueprint $table)
        {
            $table->increments('Id')->unsigned();
            $table->string('Nome', 100);
            $table->string('Email', 60);
            $table->integer('IdPerfil')->unsigned();
            $table->boolean('IsVendedor')->default(false);
            $table->timestamps();
        });

        Schema::table('Usuarios', function($table)
        {
            $table->foreign('IdPerfil')->references('Id')->on('PerfisUsuarios');
        });
    }


    public function down()
    {
        Schema::drop('Usuarios');
    }
}
