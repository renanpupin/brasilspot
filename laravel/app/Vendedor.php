<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $table = "Vendedores";

    protected $fillable = Array(
      'isCoordenador',
      'idUsuario',
      'idTipo',
      'idMeta',
      'idVendedorPai'
    );
}
