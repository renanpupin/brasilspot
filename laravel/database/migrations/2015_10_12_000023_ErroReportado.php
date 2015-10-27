<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ErroReportado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('errosReportados');
    }
}
