<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Assinatura extends Migration
{
    public function up()
    {
        Schema::create('assinaturas', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->dateTime('dataVencimento');
            $table->integer('idPlano')->unsigned();
            $table->timestamps();
        });

        Schema::table('assinaturas', function($table)
        {
            $table->foreign('idPlano')->references('id')->on('planos');
        });
    }


    public function down()
    {
        Schema::drop('assinaturas');
    }
}
