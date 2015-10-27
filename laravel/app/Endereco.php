<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = "enderecos";

    protected $fillable = array(
      'endereco',
      'bairro',
      'cidade',
      'estado',
      'cep',
      'lon',
      'lat'
    );
}
