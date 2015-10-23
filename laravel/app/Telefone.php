<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $table = "telefones";

    protected $fillable = array(
      'numero'
    );
}
