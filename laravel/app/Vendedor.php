<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $table = "vendedores";

    protected $fillable = Array(
      'isCoordenador',
      'idUsuario',
      'idTipo',
      'idMeta',
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

    public function Meta()
    {
        return $this->hasOne('\App\Meta','id','idMeta');
    }

    public function Vendedor()
    {
        return $this->hasOne('\App\User','id','idVendedorPai');
    }
}
