<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reclamacoes extends Migration
{

    public function up()
    {
        Schema::create('reclamacoes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('idUsuario')->unsigned();
            $table->string('descricao');
            $table->boolean('isVisualizada')->default(false);
            $table->timestamps();
        });

        Schema::table('reclamacoes', function($table)
        {
            $table->foreign('idUsuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reclamacoes', function(Blueprint $table) {
            $table->dropForeign(['idUsuario']);

            //<table_name>_<column_name>_foreign
        });
        Schema::drop('reclamacoes');
    }
}
