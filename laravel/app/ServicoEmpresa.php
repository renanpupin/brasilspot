<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicoEmpresa extends Model
{
    protected $table = "servicosEmpresas";

    protected $fillable = array(
      'idEmpresa',
      'idServico',
    );

    public function Empresa()
    {
        return $this->hasOne('\App\Empresa','id','idEmpresa');
    }

    public function Servico()
    {
        return $this->hasOne('\App\Servico','id','idServico');
    }
}
