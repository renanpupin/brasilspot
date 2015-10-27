<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclamacao extends Model
{
    protected $table = "reclamacoes";

    protected $fillable = array(
        'idUsuario',
        'descricao',
        'isVisualizada'
    );

    public function Usuario()
    {
        return $this->hasOne('\App\User','id','idUsuario');
    }
}
