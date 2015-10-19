<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = "Enderecos";

    protected $fillable = array(
      'endereco',
      'bairro',
      'cidade',
      'estado',
      'cordenadasLatlon'
    );
}
