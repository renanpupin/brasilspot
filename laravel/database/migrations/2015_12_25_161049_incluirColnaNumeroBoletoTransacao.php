<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IncluirColnaNumeroBoletoTransacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transacoes', function(Blueprint $table)
        {
            $table->string('numeroBoleto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transacoes', function(Blueprint $table)
        {
            $table->dropColumn('numeroBoleto');
        });
    }
}
