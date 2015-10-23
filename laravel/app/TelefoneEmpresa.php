<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TelefoneEmpresa extends Model
{
    protected $table = "telefonesEmpresas";

    protected $fillable = array(
      'idEmpresa',
      'idTelefone'
    );
}
