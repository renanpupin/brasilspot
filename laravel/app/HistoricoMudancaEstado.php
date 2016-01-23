<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class HistoricoMudancaEstado extends Model
{
    protected $table = "historicomudancaestado";

    protected $fillable = array(
        'fkTransacao',
        'fkEstadoTransacaoNovo'
    );

    public static function registrarHistoricoTransacao($idTransacao, $novoEstado)
    {
        HistoricoMudancaEstado::create([
            'fkTransacao' => $idTransacao,
            'fkEstadoTransacaoNovo' => $novoEstado
        ]);

    }

}
