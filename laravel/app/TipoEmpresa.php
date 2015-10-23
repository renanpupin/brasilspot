<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEmpresa extends Model
{
    protected $table = "tiposEmpresas";

    protected $fillable = array(
        'tipo'
    );
}
