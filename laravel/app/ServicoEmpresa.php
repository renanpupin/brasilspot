<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicoEmpresa extends Model
{
    protected $table = "servicosEmpresas";

    protected $fillable = array(
      'idEmpresa',
      'idServico',
    );
}
