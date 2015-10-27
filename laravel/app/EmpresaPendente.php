<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpresaPendente extends Model
{
    protected $table = "empresasPendentes";

    protected $fillable = array(
        'idEmpresa',
        'nomeEmpreendedor',
        'razaoSocial',
        'cpfCnpj',
        'email',
        'nomeFantasia',
        'slogan',
        'descricao',
        'horarioFuncionamento',
        'atendeCasa',
        'linkFacebook',
        'informacoesAdicionais',
        'idTipoEmpresa',
        'idUsuario',
        'idVendedor',
        'idPlano',
        'idUsuarioAlteracao',
        'isAceito',
        'dataCadastro'
    );

    public function TipoEmpresa()
    {
        return $this->hasOne('\App\TipoEmpresa','id','idTipoEmpresa');
    }

    public function Usuario()
    {
        return $this->hasOne('\App\User','id','idUsuario');
    }

    public function Vendedor()
    {
        return $this->hasOne('\App\Vendedor','id','idVendedor');
    }

    public function Plano()
    {
        return $this->hasOne('\App\Plano','id','idPlano');
    }

    public function  UsuarioAlteracao()
    {
        return $this->hasOne('\App\User','id','idUsuarioAlteracao');
    }
}
