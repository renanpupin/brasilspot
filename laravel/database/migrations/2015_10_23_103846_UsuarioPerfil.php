<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsuarioPerfil extends Migration
{

    public function up()
    {
        Schema::create('usuariosPerfis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idUsuario')->unsigned();
            $table->integer('idPerfilUsuario')->unsigned();
            $table->boolean('isVendedor')->default(false);
            $table->timestamps();
        });

        Schema::table('usuariosPerfis', function($table)
        {
            $table->foreign('idPerfilUsuario')->references('id')->on('perfisUsuarios');
            $table->foreign('idUsuario')->references('id')->on('users');
        });
    }


    public function down()
    {
        Schema::table('usuariosPerfis', function(Blueprint $table) {
            $table->dropForeign(['idPerfilUsuario']);
            $table->dropForeign(['idUsuario']);
        });
        Schema::drop('usuariosPerfis');
    }
}
