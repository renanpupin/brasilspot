<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table = "Fotos";

    protected $fillable = array(
        'foto'
    );
}
