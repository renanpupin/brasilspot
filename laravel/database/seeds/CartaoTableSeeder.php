<?php

use Illuminate\Database\Seeder;

class CartaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('cartoes')->delete();

        DB::table('cartoes')->insert(array(
            array(
                'id' => 1,
                'bandeira' => 'Visa',
                'tipo' => 'Debito'
            ),
            array(
                'id' => 2,
                'bandeira' => 'Master',
                'tipo' => 'Credito'
            ),
            array(
                'id' => 3,
                'bandeira' => 'Amex',
                'tipo' => 'Debito'
            ),
            array(
                'id' => 4,
                'bandeira' => 'ELO',
                'tipo' => 'Debito'
            )
        ));
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
