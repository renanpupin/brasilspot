<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tag extends Migration
{
    public function up()
    {
        Schema::create('Tags', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('nome', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('Tags');
    }
}
