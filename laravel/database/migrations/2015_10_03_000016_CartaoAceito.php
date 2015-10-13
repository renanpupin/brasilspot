<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CartaoAceito extends Migration
{
    public function up()
    {
        Schema::create('CartoesAceitos', function(Blueprint $table)
        {
            $table->integer('IdEmpresa')->unsigned();
            $table->integer('IdCartao')->unsigned();
            $table->timestamps();
        });

        Schema::table('CartoesAceitos', function($table)
        {
            $table->foreign('IdEmpresa')->references('Id')->on('Empresas');
            $table->foreign('IdCartao')->references('Id')->on('Cartoes');
        });
    }

    public function down()
    {
        Schema::drop('CartoesAceitos');
    }
}
