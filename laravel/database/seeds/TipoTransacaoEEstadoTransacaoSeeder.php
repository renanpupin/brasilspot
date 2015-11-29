<?php

class TipoTransacaoEEstadoTransacaoSeeder extends Seeder
{

    public function run()
    {
        $this->call('TipoTransacaoTableSeeder');
        $this->call('TipoTransacaoTableSeeder');

        $this->command->info('TipoTransacao e EstadoTransacao table seeded!');
    }

}
