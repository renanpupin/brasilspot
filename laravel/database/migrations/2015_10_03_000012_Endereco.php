<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Endereco extends Migration
{

    public function up()
    {
        Schema::create('Enderecos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('endereco', 40);
            $table->string('bairro', 25);
            $table->string('cidade', 50);
            $table->string('estado', 50);
            $table->string('cordenadasLatlon', 100);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('Enderecos');
    }
}
