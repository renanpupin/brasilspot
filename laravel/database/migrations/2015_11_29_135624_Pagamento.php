<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pagamento extends Migration
{
    public function up()
    {
        Schema::create('pagamentos', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('idUsuario')->unsigned();
            $table->string('valor');
            $table->dateTime('dataPagamento');
            $table->dateTime('dataBaixa');
            $table->timestamps();
        });

        Schema::table('pagamentos', function(Blueprint $table){
            $table->foreign('idUsuario')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::drop('pagamentos');
    }
}
