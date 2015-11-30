<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MaterialPropaganda extends Migration
{
    public function up()
    {
        Schema::create('materiaisPropagandas', function(Blueprint $table){
           $table->increments('id');
           $table->string('descricao',100);
           $table->string('motivo', 100);
           $table->integer('idUsuario')->unsigned();
        });

        Schema::table('materiaisPropagandas', function($table){
           $table->foreign('idUsuario')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('materiaisPropagandas', function(Blueprint $table) {
            $table->dropForeign(['idUsuario']);
        });
        Schema::drop('materiaisPropagandas');
    }
}
