<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssinaturaFilial extends Model
{
    protected $table = "assinaturasFiliais";

    protected $fillable = array(
        'id',
        'idAssinatura',
        'idFilial'
    );
}
