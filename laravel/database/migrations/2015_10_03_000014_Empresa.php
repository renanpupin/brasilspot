<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Empresa extends Migration
{

    public function up()
    {

        Schema::create('Empresas', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('nomeEmpreendedor', 50);
            $table->string('razaoSocial', 100);
            $table->string('cpfCnpj', 20);
            $table->string('email', 40);
            $table->string('nomeFantasia', 50);
            $table->string('slogan', 100);
            $table->string('descricao', 200);
            $table->string('horarioFuncionamento', 30);
            $table->boolean('atendeCasa')->default(false);;
            $table->string('linkFacebook', 100);
            $table->string('numeroWhatsApp', 20);
            $table->string('informacoesAdicionais', 100);
            $table->integer('idTipoEmpresa')->unsigned();
            $table->integer('idUsuario')->unsigned();
            $table->integer('idVendedor')->unsigned();
            $table->integer('idPlano')->unsigned();
            $table->dateTime('dataCadastro');
            $table->dateTime('dataVencimentoPlano');
            $table->timestamps();
        });

        Schema::table('Empresas', function($table)
        {
            $table->foreign('idTipoEmpresa')->references('id')->on('TiposEmpresas');
            $table->foreign('idUsuario')->references('id')->on('Usuarios');
            $table->foreign('idVendedor')->references('id')->on('Vendedores');
            $table->foreign('idPlano')->references('id')->on('Planos');
        });
    }

    public function down()
    {
        Schema::drop('Empresas');
    }
}
