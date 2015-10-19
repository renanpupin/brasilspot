<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CartaoAceito extends Migration
{
    public function up()
    {
        Schema::create('CartoesAceitos', function(Blueprint $table)
        {
            $table->integer('idEmpresa')->unsigned();
            $table->integer('idCartao')->unsigned();
            $table->timestamps();
        });

        Schema::table('CartoesAceitos', function($table)
        {
            $table->foreign('idEmpresa')->references('id')->on('Empresas');
            $table->foreign('idCartao')->references('id')->on('Cartoes');
        });
    }

    public function down()
    {
        Schema::drop('CartoesAceitos');
    }
}
