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

    public static function getTipoTransacao($entrada) {
        $entrada = strtolower($entrada);
        switch($entrada) {
            default:
            case 'unico':
            case 'cartao':
                return 1;

            case 'mensal':
            case 'assinatura':
                return 2;

            case 'boleto':
                return 3;
        }
    }

    public static function converteCentavos($valor) {
        return intval( floatval(str_replace(',' , '.', ltrim($valor,"R$ ") ))*100);
    }

    public static function getSkipCardHash($inputArray)
    {
        if(isset($inputArray["card_hash"])) {
            return $inputArray["card_hash"];
        } else {
            return null;
        }
    }

}
