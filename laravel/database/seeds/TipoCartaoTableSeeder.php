<?php

use Illuminate\Database\Seeder;

class TipoCartaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tiposCartoes')->delete();

        DB::table('tiposCartoes')->insert(array(
            array(
                'id' => 1,
                'descricao' => 'Débito',
            ),
            array(
                'id' => 2,
                'descricao' => 'Crédito',
            ),
            array(
                'id' => 3,
                'descricao' => 'Débito e Crédito',
            ),
            array(
                'id' => 4,
                'descricao' => 'Nenhum cartão',
            ),
        ));
    }
}
