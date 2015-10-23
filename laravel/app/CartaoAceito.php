<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartaoAceito extends Model
{
    protected $table = "cartoesAceitos";

    protected $fillable = array(
      'idEmpresa',
      'idCartao'
    );
}
