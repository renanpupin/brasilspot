<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comerciante extends Migration
{
    public function up()
    {
        Schema::create('comerciantes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('idVendedor')->unsigned();
            $table->integer('idUsuario')->unsigned();
            $table->integer('idPlano')->unsigned();
            $table->dateTime('dataVencimentoPlano');
            $table->timestamps();
        });

        Schema::table('comerciantes', function($table)
        {
            $table->foreign('idUsuario')->references('id')->on('users');
            $table->foreign('idVendedor')->references('id')->on('vendedores');
            $table->foreign('idPlano')->references('id')->on('planos');
        });
    }

    public function down()
    {
        Schema::drop('comerciantes');
    }
}
