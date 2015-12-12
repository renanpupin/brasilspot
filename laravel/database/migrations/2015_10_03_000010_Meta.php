<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Meta extends Migration
{

    public function up()
    {
        Schema::create('metas', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('nome', 100);
            $table->integer('numeroAssinaturas');
            $table->integer('recompensa');
            $table->integer('idTipoMeta');
            $table->timestamps();
        });

        //TODO: verificar porque tá dando pau pra adicioanr aqui
//        Schema::table('metas', function($table)
//        {
//            $table->foreign('idTipoMeta')->references('id')->on('tiposMeta');
//        });
    }


    public function down()
    {
//        Schema::table('metas', function(Blueprint $table) {
//            $table->dropForeign(['idTipoMeta']);
//        });

        Schema::drop('metas');
    }
}
