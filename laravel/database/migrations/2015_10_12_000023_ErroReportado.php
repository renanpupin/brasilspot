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
           $table->increments('Id');
           $table->string('Descricao');
           $table->integer('IdUsuario')->unsigned();
        });

        Schema::table('ErrosReportados', function($table)
        {
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
        Schema::drop('ErrosReportados');
    }
}
