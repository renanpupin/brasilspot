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
}
