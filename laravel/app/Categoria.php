<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "categorias";

    protected $fillable = array(
      'nome',
      'idCategoriaPai',
      'nomeCategoriaPai',
      'slug'
    );

    public function CategoriaPai()
    {
        return $this->hasOne('\App\Categoria','id','idCategoriaPai');
    }
}
