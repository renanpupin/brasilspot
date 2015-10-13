<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Endereco extends Migration
{

    public function up()
    {
        Schema::create('Enderecos', function(Blueprint $table)
        {
            $table->increments('Id');
            $table->string('Endereco', 40);
            $table->string('Bairro', 25);
            $table->string('Cidade', 50);
            $table->string('Estado', 50);
            $table->string('CordenadasLatlon', 100);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('Enderecos');
    }
}
