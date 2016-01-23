<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoTransacao extends Model
{
    protected $table = "estadotransacao";

    const Criado = 1;
    const PagamentoPendente = 2;
    const PagamentoPendenteCancelado = 3;
    const Pago = 5;
    const Recusado = 6;
    const Vencido = 7;
    const Cancelado = 8;
    const Fechado = 9;

}
