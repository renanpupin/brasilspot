<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoEmpresa extends Model
{
    protected $table = "FotosEmpresas";

    protected $fillable = array(
      'idEmpresa',
      'idFoto',
      'destaque'
    );
}
