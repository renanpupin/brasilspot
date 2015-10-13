<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PerfilUsuario extends Migration
{
    public function up()
    {
        Schema::create('PerfisUsuarios', function(Blueprint $table)
        {
            $table->increments('Id')->unsigned();
            $table->string('Tipo', 50);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('PerfisUsuarios');
    }
}
