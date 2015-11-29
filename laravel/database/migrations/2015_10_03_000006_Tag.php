<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tag extends Migration
{
    public function up()
    {
        Schema::create('tags', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('nome', 50);
            $table->string('slug',100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('tags');
    }
}
