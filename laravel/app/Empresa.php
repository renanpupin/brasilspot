<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "Empresas";

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
        'linkFacebook',
        'numeroWhatsapp',
        'idPlano',
        'idUsuario',
        'idTipoEmpresa',
        'idVendedor',
        'dataCadastro',
        'dataVencimentoPlano');

    public function TipoEmpresa()
    {
        return $this->hasOne('TiposEmpresas','id','idTipoEmpresa');
    }
}
