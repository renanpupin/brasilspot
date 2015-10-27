<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
    protected $table = "filiais";

    protected $fillable = array(
        'idEmpresa',
        'idEndereco',
        'idTelefone',
        'idWhatsApp',
        'principal'
    );

    public function Empresa()
    {
        return $this->hasOne('\App\Empresa','id','idEmpresa');
    }

    public function Endereco()
    {
        return $this->hasOne('\App\Endereco','id','idEndereco');
    }

    public function Telefone()
    {
        return $this->hasOne('\App\Telefone','id','idTelefone');
    }
    public function WhatsApp()
    {
        return $this->hasOne('\App\WhatsApp','id','idWhatsApp');
    }
}
