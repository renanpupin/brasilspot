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
           $table->increments('Id');
           $table->string('Descricao',100);
           $table->string('Motivo', 100);
           $table->integer('IdUsuario')->unsigned();
        });

        Schema::table('MateriaisPropagandas', function($table){
           $table->foreign('IdUsuario')->references('Id')->on('Usuarios');
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
