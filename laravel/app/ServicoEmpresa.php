<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicoEmpresa extends Model
{
    protected $table = "ServicosEmpresas";

    protected $fillable = array(
      'idEmpresa',
      'idServico',
    );
}
