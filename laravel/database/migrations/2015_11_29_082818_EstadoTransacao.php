<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EstadoTransacao extends Migration
{
    public function up()
    {
        Schema::create('estadotransacao', function(Blueprint $table)
        {
            $table->increments('idEstadoTransacao')->unsigned();
            $table->string('nome');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('estadotransacao');
    }
}
