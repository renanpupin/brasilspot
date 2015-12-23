<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    protected $table = "transacoes";

    protected $fillable = array(
        'idUsuario',
        'idTipoTransacao',
        'idEstadoTransacao',
        'valorBruto',
        'cardHash',
        'cardHashMensal'
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

    public static function converteStringRStoPonto($valor)
    {
        $valorReal = str_replace('R$ ', '', $valor);
        $valorReal = str_replace(',', '.', $valorReal);
        $valorReal = floatval($valorReal);
        return $valorReal;
    }

    public static function convertePontotoVirgula($valor)
    {
        return str_replace('.',',',$valor);
    }

}
