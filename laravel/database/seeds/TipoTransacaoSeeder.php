<?php

class TipoTransacaoTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tipotransacao')->delete();

        DB::table('tiposCartoes')->insert(array(
            array(
                'id' => 1,
                'nome' => 'Cartão',
            ),
            array(
                'id' => 2,
                'descricao' => 'Assinatura no Cartão',
            ),
            array(
                'id' => 3,
                'descricao' => 'Boleto',
            )
        ));
    }
}