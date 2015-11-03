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
        'idUsuario',
        'idVendedor',
        'idTipoCartao',
        'idTipoEmpresa',
        'dataCadastro',
        'dataVencimentoPlano');

    public function TipoEmpresa()
    {
        return $this->hasOne('\App\TipoEmpresa','id','idTipoEmpresa');
    }

    public function TipoCartao()
    {
        return $this->hasOne('\App\TipoCartao','id','idTipoCartao');
    }

    public function Usuario()
    {
        return $this->hasOne('\App\User','id','idUsuario');
    }

}
