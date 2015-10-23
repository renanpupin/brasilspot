<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CartaoAceito extends Migration
{
    public function up()
    {
        Schema::create('cartoesAceitos', function(Blueprint $table)
        {
            $table->integer('idEmpresa')->unsigned();
            $table->integer('idCartao')->unsigned();
            $table->timestamps();
        });

        Schema::table('cartoesAceitos', function($table)
        {
            $table->foreign('idEmpresa')->references('id')->on('empresas');
            $table->foreign('idCartao')->references('id')->on('cartoes');
        });
    }

    public function down()
    {
        Schema::drop('cartoesAceitos');
    }
}
