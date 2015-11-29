<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialPropaganda extends Model
{
    protected $table = "materiaisPropagandas";

    protected $fillable = Array(
        'id',
        'descricao',
        'motivo',
        'idUsuario',
        'aceito'
    );

    public function Usuario()
    {
        return $this->hasOne('\App\User','id','idUsuario');
    }
}
