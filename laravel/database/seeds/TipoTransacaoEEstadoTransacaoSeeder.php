<?php

use Illuminate\Database\Seeder;

class TipoTransacaoEEstadoTransacaoSeeder extends Seeder
{

    public function run()
    {
        $this->call('EstadoTransacaoTableSeeder');
        $this->call('TipoTransacaoTableSeeder');

        $this->command->info('TipoTransacao e EstadoTransacao table seeded!');
    }

}
