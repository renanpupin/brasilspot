<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Telefone extends Migration
{

    public function up()
    {
        Schema::create('Telefones', function(Blueprint $table)
        {
            $table->increments('Id')->unsigned();
            $table->string('Numero', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('Telefones');
    }
}
