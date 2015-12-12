<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoMeta extends Model
{
    protected $table = "tiposMeta";

    protected $fillable = array(
        'descricao'
    );
}
