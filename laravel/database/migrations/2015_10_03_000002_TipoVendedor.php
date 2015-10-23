<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TipoVendedor extends Migration
{

    public function up()
    {
        Schema::create('tiposVendedores', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('tipo', 100);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('tiposVendedores');
    }
}
