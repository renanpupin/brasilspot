<?php

use Illuminate\Database\Seeder;

class ServicoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('servicos')->insert(array(
            array(
                'id' => 1,
                'descricao' => 'Aberto 24 horas',
            ),
            array(
                'id' => 2,
                'descricao' => 'Acesso para deficientes físicos',
            ),
            array(
                'id' => 3,
                'descricao' => 'Ar condicionado',
            ),
            array(
                'id' => 4,
                'descricao' => 'Buffet',
            ),
            array(
                'id' => 5,
                'descricao' => 'Delivery',
            ),
            array(
                'id' => 6,
                'descricao' => 'Música ao vivo',
            ),
            array(
                'id' => 7,
                'descricao' => 'Wifi',
            ),
            array(
                'id' => 8,
                'descricao' => 'Karaokê',
            ),
            array(
                'id' => 9,
                'descricao' => 'Estacionamento',
            ),
        ));
    }
}
