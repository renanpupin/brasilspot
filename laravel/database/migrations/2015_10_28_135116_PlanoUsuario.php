<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PlanoUsuario extends Migration
{

    public function up()
    {
        Schema::create('planosUsuarios', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('idPlano')->unsigned();
            $table->dateTime('dataVencimento');
        });

        Schema::table('planosUsuarios',function($table)
        {
            $table->foreign('planos')->references('id')->on('idPlano');
        });
    }


    public function down()
    {
        Schema::drop('planosUsuarios');
    }
}
