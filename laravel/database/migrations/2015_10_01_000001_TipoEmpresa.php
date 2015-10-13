<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TipoEmpresa extends Migration
{

    public function up()
    {
        Schema::create('TiposEmpresas', function(Blueprint $table)
        {
            $table->increments('Id')->unsigned();
            $table->string('Tipo', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema:drop('TiposEmpresas');
    }
}
