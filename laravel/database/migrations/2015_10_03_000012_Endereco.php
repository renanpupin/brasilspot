<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Endereco extends Migration
{

    public function up()
    {
        Schema::create('enderecos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('endereco', 40);
            $table->string('bairro', 25);
            $table->string('cidade', 50);
            $table->string('estado', 50);
            $table->string('cep', 10);
            $table->string('lat', 100);
            $table->string('log', 100);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('enderecos');
    }
}
