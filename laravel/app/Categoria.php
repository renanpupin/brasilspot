<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "categorias";

    protected $fillable = array(
      'nome',
      'idCategoriaPai',
      'idTipoCategoria',
      'slug'
    );

    public function CategoriaPai()
    {
        return $this->hasOne('\App\Categoria','id','idCategoriaPai');
    }

    public function TipoCategoria()
    {
        return $this->hasOne('\App\TipoEmpresa','id','idTipoCategoria');
    }
}
