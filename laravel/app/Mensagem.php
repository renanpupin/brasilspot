<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $table = "mensagens";

    protected $fillable = array(
        'id',
        'idUsuario',
        'rementente',
        'idUsuarioDestino',
        'dataEnvio',
        'dataRespondida'
    );

    public function Usuario()
    {
        return $this->hasOne('\App\User','id','idUsuario');
    }

    public function UsuarioDestino()
    {
        return $this->hasOne('\App\User','id','idUsuarioDestino');
    }
}
