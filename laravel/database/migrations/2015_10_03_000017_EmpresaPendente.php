<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmpresaPendente extends Migration
{

    public function up()
    {
        Schema::create('EmpresasPendentes', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('idEmpresa')->unsigned();
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
            $table->integer('idUsuarioAlteracao')->unsigned();
            $table->boolean('isAceito')->default(false);;
            $table->dateTime('dataCadastro');
            $table->timestamps();
        });

        Schema::table('EmpresasPendentes',function($table){
            $table->foreign('idTipoEmpresa')->references('id')->on('TiposEmpresas');
            $table->foreign('idUsuario')->references('id')->on('Usuarios');
            $table->foreign('idVendedor')->references('id')->on('Vendedores');
            $table->foreign('idPlano')->references('id')->on('Planos');
            $table->foreign('idUsuarioAlteracao')->references('id')->on('Usuarios');
        });
    }

    public function down()
    {
        Schema::drop('EmpresasPendentes');
    }
}
