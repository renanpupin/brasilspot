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

    public function Vendedor()
    {
        return $this.hasOne('\App\User','id','idVendedorPai');
    }
}
