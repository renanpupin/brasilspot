<?php

use Illuminate\Database\Seeder;

class EstadoTransacaoTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('estadotransacao')->delete();

        DB::table('estadotransacao')->insert(array(
            array(
                'idEstadoTransacao' => 1,
                'nome' => 'Criado',
            ),
            array(
                'idEstadoTransacao' => 2,
                'nome' => 'Pagamento Pendente',
            ),
            array(
                'idEstadoTransacao' => 3,
                'nome' => 'Pagamento Pendente Cancelado',
            ),
            array(
                'idEstadoTransacao' => 5,
                'nome' => 'Pago',
            ),
            array(
                'idEstadoTransacao' => 6,
                'nome' => 'Cancelado',
            ),
            array(
                'idEstadoTransacao' => 7,
                'nome' => 'Fechado',
            )
        ));
    }
}