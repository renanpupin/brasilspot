<?php

use Illuminate\Database\Seeder;

class EnderecoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('enderecos')->delete();

        DB::table('enderecos')->insert(array(
            array(
                'id' => 1,
                'endereco' => 'Avenida Paulista, 131',
                'bairro' => 'Centro',
                'cidade' => 'São Paulo Capital',
                'estado' => 'São Paulo',
                'cep' => '15555-555',
                'lat' => '-51.212',
                'lon' => '-22.215'
            ),
        ));
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
