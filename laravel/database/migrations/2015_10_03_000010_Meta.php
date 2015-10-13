<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Meta extends Migration
{

    public function up()
    {
        Schema::create('Metas', function(Blueprint $table)
        {
            $table->increments('Id')->unsigned();
            $table->integer('NumeroEmpresas');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('Metas');
    }
}
