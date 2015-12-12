<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $table = "metas";

    protected $fillable = Array(
        'nome',
        'numeroAssinaturas',
        'recompensa',
        'idTipoMeta'
    );

    public function TipoMeta()
    {
        return $this->hasOne('\App\TipoMeta','id','idTipoMeta');
    }
}
