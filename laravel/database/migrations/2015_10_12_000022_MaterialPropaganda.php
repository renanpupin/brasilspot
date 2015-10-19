<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MaterialPropaganda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MateriaisPropagandas', function(Blueprint $table){
           $table->increments('id');
           $table->string('descricao',100);
           $table->string('motivo', 100);
           $table->integer('idUsuario')->unsigned();
        });

        Schema::table('MateriaisPropagandas', function($table){
           $table->foreign('idUsuario')->references('id')->on('Usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('MateriaisPropagandas');
    }
}
