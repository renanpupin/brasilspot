<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Foto extends Migration
{

    public function up()
    {
        Schema::create('Fotos', function(Blueprint $table)
        {
            $table->increments('Id')->unsigned();
            $table->string('Foto',400);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('Fotos');
    }
}
