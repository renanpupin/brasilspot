<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioPerfil extends Model
{
    protected $table = 'usuariosPerfis';

    protected $fillable = array(
        'idUsuario',
        'idPerfilUsuario',
        'isVendedor'
    );

    public function PerfilUsuario()
    {
        return $this->hasOne('\App\PerfilUsuario','id','idPerfilUsuario');
    }
}
