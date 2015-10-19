<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $table = "Telefones";

    protected $fillable = array(
      'numero'
    );
}
