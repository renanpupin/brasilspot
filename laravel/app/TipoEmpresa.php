<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEmpresa extends Model
{
    protected $table = "TiposEmpresas";

    protected $fillable = array(
        'tipo'
    );
}
