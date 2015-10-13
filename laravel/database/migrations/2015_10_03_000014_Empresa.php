<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Empresa extends Migration
{

    public function up()
    {

        Schema::create('Empresas', function(Blueprint $table)
        {
            $table->increments('Id')->unsigned();
            $table->string('NomeEmpreendedor', 50);
            $table->string('RazaoSocial', 100);
            $table->string('CpfCnpj', 20);
            $table->string('Email', 40);
            $table->string('NomeFantasia', 50);
            $table->string('Slogan', 100);
            $table->string('Descricao', 200);
            $table->string('HorarioFuncionamento', 30);
            $table->boolean('AtendeCasa')->default(false);;
            $table->string('LinkFacebook', 100);
            $table->string('NumeroWhatsApp', 20);
            $table->string('InformacoesAdicionais', 100);
            $table->integer('IdTipoEmpresa')->unsigned();
            $table->integer('IdUsuario')->unsigned();
            $table->integer('IdVendedor')->unsigned();
            $table->integer('IdPlano')->unsigned();
            $table->dateTime('DataCadastro');
            $table->dateTime('DataVencimentoPlano');
            $table->timestamps();
        });

        Schema::table('Empresas', function($table)
        {
            $table->foreign('IdTipoEmpresa')->references('Id')->on('TiposEmpresas');
            $table->foreign('IdUsuario')->references('Id')->on('Usuarios');
            $table->foreign('IdVendedor')->references('Id')->on('Vendedores');
            $table->foreign('IdPlano')->references('Id')->on('Planos');
        });
    }

    public function down()
    {
        Schema::drop('Empresas');
    }
}
