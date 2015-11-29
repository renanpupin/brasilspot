<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PlanoUsuario extends Migration
{

    public function up()
    {
        Schema::create('planosUsuarios', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('idPlano')->unsigned();
            $table->dateTime('dataVencimento');
        });

        Schema::table('planosUsuarios',function($table)
        {
            $table->foreign('idPlano')->references('id')->on('planos');
        });
    }


    public function down()
    {
        Schema::table('contract', function(Blueprint $table) {
            $table->dropForeign('contract_product_id_foreign');
            $table->removeColumn('product_id');
        });
        
        Schema::drop('planosUsuarios');
    }
}
