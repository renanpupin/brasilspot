<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerfilUsuario extends Model
{
    protected $table = "PerfisUsuarios";

    protected $fillable = array(
        'tipo'
    );
}
