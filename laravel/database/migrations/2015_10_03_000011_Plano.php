<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Plano extends Migration
{

    public function up()
    {
        Schema::create('Planos', function(Blueprint $table)
        {
            $table->increments('Id')->unsigned();
            $table->string('Nome', 100);
            $table->decimal('Valor',4,2);
            $table->string('Descricao', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('Planos');
    }
}
