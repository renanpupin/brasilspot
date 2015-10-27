<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "empresas";

    protected $fillable = array(
        'nomeEmpreendedor',
        'razaoSocial',
        'nomeFantasia',
        'slogan',
        'cpfCnpj',
        'email',
        'descricao',
        'horarioFuncionamento',
        'atendeCasa',
        'idPlano',
        'idUsuario',
        'idTipoEmpresa',
        'idVendedor',
        'dataCadastro',
        'dataVencimentoPlano');

    public function TipoEmpresa()
    {
        return $this->hasOne('\App\TipoEmpresa','id','idTipoEmpresa');
    }

    public function Plano()
    {
        return $this->hasOne('\App\Plano','id','idPlano');
    }

    public function Usuario()
    {
        return $this->hasOne('\App\User','id','idUsuario');
    }

    public function Vendedor()
    {
        return $this->hasOne('\App\Vendedor','id','idVendedor');
    }
}
