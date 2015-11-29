<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TipoTransacao extends Migration
{
    public function up()
    {
        Schema::create('tipotransacao', function(Blueprint $table)
        {
            $table->increments('idTipoTransacao')->unsigned();
            $table->string('nome');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('tipotransacao');
    }
}

