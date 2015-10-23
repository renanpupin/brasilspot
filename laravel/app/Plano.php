<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    protected $table = "planos";

    protected $fillable = array(
        'nome',
        'valor',
        'descricao'
    );
}
