<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoEmpresa extends Model
{
    protected $table = "fotosEmpresas";

    protected $fillable = array(
      'idEmpresa',
      'idFoto',
      'destaque'
    );
}
