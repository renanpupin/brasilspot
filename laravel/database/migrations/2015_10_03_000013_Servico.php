<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Servico extends Migration
{

    public function up()
    {
        Schema::create('Servicos', function(Blueprint $table)
        {
            $table->increments('Id')->unsigned();
            $table->string('Descricao');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('Servicos');
    }
}
