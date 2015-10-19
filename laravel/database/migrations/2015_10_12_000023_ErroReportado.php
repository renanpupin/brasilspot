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
        Schema::create('ErrosReportados', function(Blueprint $table)
        {
           $table->increments('id');
           $table->string('descricao');
           $table->integer('idUsuario')->unsigned();
        });

        Schema::table('ErrosReportados', function($table)
        {
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
        Schema::drop('ErrosReportados');
    }
}
