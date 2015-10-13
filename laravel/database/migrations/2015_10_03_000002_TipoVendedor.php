<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TipoVendedor extends Migration
{

    public function up()
    {
        Schema::create('TiposVendedores', function(Blueprint $table)
        {
            $table->increments('Id')->unsigned();
            $table->string('Tipo', 100);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('TiposVendedores');
    }
}
