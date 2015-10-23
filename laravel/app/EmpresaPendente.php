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
}
