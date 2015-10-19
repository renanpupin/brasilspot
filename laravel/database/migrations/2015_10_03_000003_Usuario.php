<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuario extends Migration
{

    public function up()
    {
        Schema::create('Usuarios', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('nome', 100);
            $table->string('email', 60);
            $table->integer('idPerfil')->unsigned();
            $table->boolean('isVendedor')->default(false);
            $table->timestamps();
        });

        Schema::table('Usuarios', function($table)
        {
            $table->foreign('idPerfil')->references('id')->on('PerfisUsuarios');
        });
    }


    public function down()
    {
        Schema::drop('Usuarios');
    }
}
