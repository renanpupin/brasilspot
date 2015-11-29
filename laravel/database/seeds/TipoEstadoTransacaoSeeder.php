<?php

class TipoEstadoTransacaoTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tipoestadotransacao')->delete();

        DB::table('tipoestadotransacao')->insert(array(
            array(
                'id' => 1,
                'nome' => 'Criado',
            ),
            array(
                'id' => 2,
                'nome' => 'Pagamento Pendente',
            ),
            array(
                'id' => 3,
                'nome' => 'Pagamento Pendente Cancelado',
            ),
            array(
                'id' => 5,
                'nome' => 'Pago',
            ),
            array(
                'id' => 6,
                'nome' => 'Cancelado',
            ),
            array(
                'id' => 7,
                'nome' => 'Fechado',
            )
        ));
    }

}