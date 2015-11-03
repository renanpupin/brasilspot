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
            $table->string('descricao', 250);
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
        Schema::drop('reclamacoes');
    }
}
