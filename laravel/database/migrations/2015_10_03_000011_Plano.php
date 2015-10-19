<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Plano extends Migration
{

    public function up()
    {
        Schema::create('Planos', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('nome', 100);
            $table->decimal('valor',4,2);
            $table->string('descricao', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('Planos');
    }
}
