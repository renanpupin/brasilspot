<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ErroReportado extends Migration
{
    public function up()
    {
        Schema::create('errosReportados', function(Blueprint $table)
        {
           $table->increments('id');
           $table->string('descricao');
           $table->integer('idUsuario')->unsigned();
           $table->boolean('isCorrigido')->default(false);
           $table->timestamps();
        });

        Schema::table('errosReportados', function($table)
        {
            $table->foreign('idUsuario')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('errosReportados', function(Blueprint $table) {
            $table->dropForeign(['idUsuario']);
        });
        Schema::drop('errosReportados');
    }
}
