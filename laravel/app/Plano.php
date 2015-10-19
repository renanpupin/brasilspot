<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    protected $table = "Planos";

    protected $fillable = array(
        'nome',
        'valor',
        'descricao'
    );
}
