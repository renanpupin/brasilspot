<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerfilUsuario extends Model
{
    protected $table = "perfisUsuarios";

    protected $fillable = array(
        'tipo'
    );
}
