<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MetaVendedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metasVendedor', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('idMeta')->unsigned();
            $table->integer('idVendedor')->unsigned();
            $table->timestamps();
        });

//        Schema::table('metasVendedor', function($table)
//        {
//            $table->foreign('idMeta')->references('id')->on('metas');
//        });
//
//        Schema::table('metasVendedor', function($table)
//        {
//            $table->foreign('idVendedor')->references('id')->on('vendedor');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('metasVendedor');
    }
}
