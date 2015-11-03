<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCartao extends Model
{
    protected $table = "tiposCartoes";

    protected $fillable = array(
        'descricao'
    );
}
