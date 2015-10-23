<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cartao extends Model
{
    protected $table = "cartoes";

    protected $fillable = array(
        'bandeira',
        'tipo'
    );
}
