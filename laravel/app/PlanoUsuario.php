<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanoUsuario extends Model
{
    protected $table = "planosUsuarios";

    protected $fillable = array(
        'idPlano',
        'dataVencimento'
    );

    public function Plano()
    {
        return $this->hasOne('\App\Plano','id','idPlano');
    }

}
