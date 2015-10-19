<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartaoAceito extends Model
{
    protected $table = "CartoesAceitos";

    protected $fillable = array(
      'idEmpresa',
      'idCartao'
    );
}
