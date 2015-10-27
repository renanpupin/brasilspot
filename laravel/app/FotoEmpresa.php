<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoEmpresa extends Model
{
    protected $table = "fotosEmpresas";

    protected $fillable = array(
      'idEmpresa',
      'idFoto',
      'destaque'
    );

    public function Empresa()
    {
        return $this->hasOne('\App\Empresa','id','idEmpresa');
    }

    public function Foto()
    {
        return $this->hasOne('\App\Foto','id','idFoto');
    }
}
