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
}
