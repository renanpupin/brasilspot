<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AssinaturaFilial extends Migration
{
    public function up()
    {
        Schema::create('assinaturasFiliais', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('idAssinatura')->unsigned();
            $table->integer('idFilial')->unsigned();
            $table->timestamps();
        });

        Schema::table('assinaturasFiliais', function($table)
        {
            $table->foreign('idAssinatura')->references('id')->on('assinaturas');
            $table->foreign('idFilial')->references('id')->on('filiais');
        });
    }

    public function down()
    {
        Schema::table('assinaturasFiliais', function(Blueprint $table) {
            $table->dropForeign(['idAssinatura']);
            $table->dropForeign(['idFilial']);
            //<table_name>_<column_name>_foreign
        });
        Schema::drop('assinaturasFiliais');
    }
}
