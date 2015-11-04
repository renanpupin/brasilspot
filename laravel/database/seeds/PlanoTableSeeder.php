<?php

use Illuminate\Database\Seeder;

class PlanoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('planos')->delete();

        //administradores
        DB::table('planos')->insert(array(
            array(
                'id' => 1,
                'nome' => 'Básico',
                'valor' => '19.90',
                'descricao' => 'plano básico'
            ),
            array(
                'id' => 2,
                'nome' => 'Pro',
                'valor' => '39.90',
                'descricao' => 'plano pro'
            )
        ));
    }
}
