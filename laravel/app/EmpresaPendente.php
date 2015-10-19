<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpresaPendente extends Model
{
    protected $table = "EmpresasPendentes";

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
        'numeroWhatsApp',
        'informacoesAdicionais',
        'idTipoEmpresa',
        'idUsuario',
        'idVendedor',
        'idPlano',
        'idUsuarioAlteracao',
        'isAceito',
        'dataCadastro'
    );
}
