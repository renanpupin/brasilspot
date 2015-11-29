<?php

use Illuminate\Database\Seeder;

class TipoTransacaoTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tipotransacao')->delete();

        DB::table('tipotransacao')->insert(array(
            array(
                'idTipoTransacao' => 1,
                'nome' => 'Cartão',
            ),
            array(
                'idTipoTransacao' => 2,
                'nome' => 'Assinatura no Cartão',
            ),
            array(
                'idTipoTransacao' => 3,
                'nome' => 'Boleto',
            )
        ));
    }
}