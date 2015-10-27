<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartaoAceito extends Model
{
    protected $table = "cartoesAceitos";

    protected $fillable = array(
        'idEmpresa',
        'idCartao'
    );

    public function Empresa()
    {
        return $this->hasOne('\App\Empresa','id','idEmpresa');
    }

    public function Cartao()
    {
        return $this->hasOne('\App\Cartao','id','idCartao');
    }
}
