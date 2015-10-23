<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Meta extends Migration
{

    public function up()
    {
        Schema::create('metas', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('numeroEmpresas');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('metas');
    }
}
