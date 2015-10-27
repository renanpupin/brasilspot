<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaEmpresa extends Model
{
    protected $table = "categoriasEmpresas";

    protected $fillable = array(
      'idEmpresa',
      'idCategoria'
    );

    public function Empresa()
    {
       return $this->hasOne('\App\Empresa','id','idEmpresa');
    }

    public function Categoria()
    {
        return $this->hasOne('\App\Categoria','id','idCategoria');
    }
}
