<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    protected $table = "transacao";

    protected $fillable = array(
        'fkEmpresa',
        'fkCartao',
        'fkEstadoTransacao',
        'fkTipoTransacao',
        'cardHash',
        'valorBruto',
        'dataInicio',
        'dataResposta'
    );

}
