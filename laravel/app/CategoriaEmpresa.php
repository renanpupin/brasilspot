<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaEmpresa extends Model
{
    protected $table = "CategoriasEmpresas";

    protected $fillable = array(
      'idEmpresa',
      'idCategoria'
    );
}
