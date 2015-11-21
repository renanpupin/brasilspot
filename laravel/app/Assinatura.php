<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assinatura extends Model
{
    protected $table = "assinaturas";

    protected $fillable = array(
        'id',
        'dataVencimento',
        'idPlano'
    );

    public function Plano()
    {
        return $this->hasOne('\App\Plano','id','idPlano');
    }
}
