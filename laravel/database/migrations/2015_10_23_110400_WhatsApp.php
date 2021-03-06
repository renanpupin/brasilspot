<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WhatsApp extends Migration
{
    public function up()
    {
        Schema::create('whatsApp', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('numero');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('whatsApp');
    }
}
