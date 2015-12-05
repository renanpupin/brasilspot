<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $table = "pagamentos";

    protected $fillable = array(
        'idUsuario',
        'dataPagamento',
        'dataBaixa'
    );

    public function Usuario()
    {
        return $this->hasOne('\App\User','id','idUsuario');
    }
}
