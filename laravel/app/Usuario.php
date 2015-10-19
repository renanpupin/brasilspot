<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = "Usuarios";

    protected $fillable = array(
        'nome',
        'email',
        'idPerfil',
        'isVendedor'
    );
}
