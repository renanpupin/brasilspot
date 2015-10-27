<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErroReportado extends Model
{
    protected $table = "errosReportados";

    protected $fillable = array(
        'descricao',
        'idUsuario',
        'isCorrigido'
    );

    public function Usuario()
    {
        return $this->hasOne('\App\User','id','idUsuario');
    }
}
