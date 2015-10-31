<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TipoCartao extends Migration
{

    public function up()
    {
        Schema::create('tiposCartoes',function(Blueprint $table){
            $table->increments('id');
            $table->string('descricao',30);
        });
    }


    public function down()
    {
        Schema::drop('tiposCartoes');
    }
}
