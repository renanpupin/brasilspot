<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TelefoneEmpresa extends Model
{
    protected $table = "TelefonesEmpresas";

    protected $fillable = array(
      'idEmpresa',
      'idTelefone'
    );
}
