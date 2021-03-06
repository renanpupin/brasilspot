<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AssinaturaComerciante extends Migration
{
    public function up()
    {
        Schema::create('assinaturasComerciantes', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('idComerciante')->unsigned();
            $table->integer('idAssinatura')->unsigned();
            $table->timestamps();
        });

        Schema::table('assinaturasComerciantes', function($table)
        {
            $table->foreign('idComerciante')->references('id')->on('comerciantes');
            $table->foreign('idAssinatura')->references('id')->on('assinaturas');
        });
    }

    public function down()
    {
        Schema::table('assinaturasComerciantes', function(Blueprint $table) {
            $table->dropForeign(['idComerciante']);
            $table->dropForeign(['idAssinatura']);
        });
        Schema::drop('assinaturasComerciantes');
    }
}
