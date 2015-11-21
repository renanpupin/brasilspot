<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comerciante extends Model
{
    protected $table = "comerciantes";

    protected $fillable = array(
        'idUsuario',
        'idVendedor',
        'idPlano',
        'dataVencimentoPlano'
    );

    public function Vendedor()
    {
        return $this->hasOne('\App\Vendedor','id','idVendedor');
    }

    public function Usuario()
    {
        return $this->hasOne('\App\Usuario','id','idUsuario');
    }

    public function Plano()
    {
        return $this->hasOne('\App\Plano','id','idPlano');
    }
}
