<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "Categorias";

    protected $fillable = array(
      'nome',
      'idCategoriaPai',
      'nomeCategoriaPai'
    );

    public function CategoriaPai()
    {
        return $this->hasOne('App\Categoria','id','idCategoriaPai');
    }
}
