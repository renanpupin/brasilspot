<?php

use Illuminate\Database\Seeder;

class EstadoTransacaoTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('estadotransacao')->delete();

        DB::table('estadotransacao')->insert(array(
            array(
                'idEstadoTransacao' => \App\EstadoTransacao::Criado,
                'nome' => 'Criado',
            ),
            array(
                'idEstadoTransacao' =>\App\EstadoTransacao::PagamentoPendente,
                'nome' => 'Pagamento Pendente',
            ),
            array(
                'idEstadoTransacao' => \App\EstadoTransacao::PagamentoPendenteCancelado,
                'nome' => 'Pagamento Pendente Cancelado',
            ),
            array(
                'idEstadoTransacao' => \App\EstadoTransacao::Pago,
                'nome' => 'Pago',
            ),
            array(
                'idEstadoTransacao' => \App\EstadoTransacao::Recusado,
                'nome' => 'Recusado',
            ),
            array(
                'idEstadoTransacao' => \App\EstadoTransacao::Vencido,
                'nome' => 'Vencido',
            ),
            array(
                'idEstadoTransacao' => \App\EstadoTransacao::Cancelado,
                'nome' => 'Cancelado',
            ),
            array(
                'idEstadoTransacao' => \App\EstadoTransacao::Fechado,
                'nome' => 'Fechado',
            )
        ));
    }
}