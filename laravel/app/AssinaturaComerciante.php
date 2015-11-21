<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssinaturaComerciante extends Model
{
    protected $table = "assinaturasComerciantes";

    protected $fillable = array(
        'id',
        'idComerciante',
        'idAssinatura'
    );

    public function Assinatura()
    {
        return $this->hasOne('\App\Assinatura','id','idAssinatura');
    }
}
