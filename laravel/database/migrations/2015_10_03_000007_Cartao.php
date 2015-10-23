<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cartao extends Migration
{

    public function up()
    {
        Schema::create('cartoes', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('bandeira', 100);
            $table->string('tipo', 100);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('cartoes');
    }
}
