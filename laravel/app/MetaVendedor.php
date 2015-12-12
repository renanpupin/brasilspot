<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetaVendedor extends Model
{
    protected $table = "metasVendedor";

    protected $fillable = array(
        'idMeta',
        'idVendedor'
    );

    public function Meta()
    {
        return $this->hasOne('\App\Meta','id','idMeta');
    }

    public function Vendedor()
    {
        return $this->hasOne('\App\Vendedor','id','idVendedor');
    }
}
