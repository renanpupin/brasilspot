<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TelefoneEmpresa extends Model
{
    protected $table = "telefonesEmpresas";

    protected $fillable = array(
      'idEmpresa',
      'idTelefone'
    );

    public function Empresa()
    {
        return $this->hasOne('\App\Empresa','id','idEmpresa');
    }

    public function Telefone()
    {
        return $this->hasOne('\App\Telefone','id','idTelefone');
    }
}
