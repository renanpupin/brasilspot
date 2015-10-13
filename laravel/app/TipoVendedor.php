<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoVendedor extends Model
{
    protected $table = "TiposVendedores";

    protected $fillable = array('Tipo');
}
