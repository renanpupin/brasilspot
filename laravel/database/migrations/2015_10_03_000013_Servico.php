<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Servico extends Migration
{

    public function up()
    {
        Schema::create('servicos', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('descricao');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('servicos');
    }
}
