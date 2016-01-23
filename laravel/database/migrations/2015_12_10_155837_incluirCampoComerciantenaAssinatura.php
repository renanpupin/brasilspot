<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\AssinaturaComerciante;
use App\AssinaturaFilial;
use App\Assinatura;

class IncluirCampoComerciantenaAssinatura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assinaturas', function (Blueprint $table) {
            $table->integer('idComerciante');
        });

        //passar todos os dados existentes na tabela antiga, se houver algum
        $asCom = AssinaturaComerciante::all()->toArray();
        foreach ($asCom as $single) {
            $assina = Assinatura::find(['id' => $single['idAssinatura']])->first();
            $assina->idComerciante = $single['idComerciante'];
            $assina->save();
        }

        Schema::table('assinaturasComerciantes', function(Blueprint $table) {
            $table->dropForeign(['idComerciante']);
            $table->dropForeign(['idAssinatura']);
        });

        Schema::dropIfExists('assinaturasComerciantes');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::create('assinaturasComerciantes', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('idComerciante')->unsigned();
            $table->integer('idAssinatura')->unsigned();
            $table->timestamps();
        });

        Schema::table('assinaturasComerciantes', function($table)
        {
            $table->foreign('idComerciante')->references('id')->on('comerciantes');
            $table->foreign('idAssinatura')->references('id')->on('assinaturas');
        });

        //voltar os dados para a tabela antiga
        $assi = Assinatura::all()->toArray();
        foreach ($assi as $single) {
            $assinaCom = AssinaturaComerciante::create(['idAssinatura' => $single['id'], 'idComerciante' => $single['idComerciante']]);
            $assinaCom->save();
        }


        Schema::table('assinaturas', function (Blueprint $table) {
            $table->dropColumn('idComerciante');
        });
    }
}
