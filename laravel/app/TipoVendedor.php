<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoVendedor extends Model
{
    protected $table = "tiposVendedores";

    protected $fillable = array(
        'tipo'
    );
}
