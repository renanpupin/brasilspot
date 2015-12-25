<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlteraColunaisPaidPagamento extends Migration
{
    public function up()
    {
        Schema::table('pagamentos', function(Blueprint $table)
        {
            $table->dropColumn('isPaid');
        });
        Schema::table('pagamentos', function(Blueprint $table)
        {
            $table->integer('isPaid');
        });
    }


    public function down()
    {
        Schema::table('pagamentos', function(Blueprint $table) {
            $table->dropColumn('isPaid');
        });
        Schema::table('pagamentos', function(Blueprint $table) {
            $table->boolean('isPaid')->default(false);
        });
    }
}
