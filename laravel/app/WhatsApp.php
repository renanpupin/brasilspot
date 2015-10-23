<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhatsApp extends Model
{
    protected $table = "whatsApp";

    protected $fillable = Array(
        'numero'
    );
}
