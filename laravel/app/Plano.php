<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    protected $table = "Planos";

    protected $fillable = array('Nome','Valor','Descricao');
}
