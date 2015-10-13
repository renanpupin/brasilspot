<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "Empresas";

    protected $fillable = array(
        'NomeEmpreendedor',
        'RazaoSocial',
        'NomeFantasia',
        'Slogan',
        'CpfCnpj',
        'Email',
        'Descricao',
        'HorarioFuncionamento',
        'AtendeCasa',
        'LinkFacebook',
        'NumeroWhatsapp',
        'IdPlano',
        'IdUsuario',
        'IdTipoEmpresa',
        'IdVendedor',
        'DataCadastro',
        'DataVencimentoPlano');

    public function TipoEmpresa()
    {
        return $this->hasOne('TiposEmpresas','Id','IdTipoEmpresa');
    }
}
