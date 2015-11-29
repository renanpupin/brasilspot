<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $table = "servicos";

    protected $fillable = array(
        'descricao',
        'slug'
    );
}
