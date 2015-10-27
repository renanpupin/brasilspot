<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagEmpresa extends Model
{
    protected $table = "tagsEmpresas";

    protected $fillable = array(
      'idEmpresa',
      'idTag'
    );

    public function Empresa()
    {
        return $this->hasOne('\App\Empresa','id','idEmpresa');
    }

    public function Tag()
    {
        return $this->hasOne('\App\Tag','id','idTag');
    }
}
