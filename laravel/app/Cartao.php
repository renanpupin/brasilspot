<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cartao extends Model
{
    protected $table = "Cartoes";

    protected $fillable = array(
        'bandeira',
        'tipo'
    );
}
