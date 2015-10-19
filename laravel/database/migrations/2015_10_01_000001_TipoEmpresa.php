<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TipoEmpresa extends Migration
{

    public function up()
    {
        Schema::create('TiposEmpresas', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('tipo', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema:drop('TiposEmpresas');
    }
}
