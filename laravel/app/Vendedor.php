<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $table = "vendedores";

    protected $fillable = Array(
      'idUsuario',
      'idTipo',
      'idVendedorPai'
    );

    public function Usuario()
    {
        return $this->hasOne('\App\User','id','idUsuario');
    }

    public function TipoVendedor()
    {
        return $this->hasOne('\App\TipoVendedor','id','idTipo');
    }

    public function VendedorPai()
    {
        return $this->hasOne('\App\User','id','idVendedorPai');
    }
}
