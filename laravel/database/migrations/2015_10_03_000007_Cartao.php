<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cartao extends Migration
{

    public function up()
    {
        Schema::create('Cartoes', function(Blueprint $table)
        {
            $table->increments('Id')->unsigned();
            $table->string('Bandeira', 100);
            $table->string('Tipo', 100);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('Cartoes');
    }
}
