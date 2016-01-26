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
        DB::table('cartoes')->insert(array(
            array(
                'id' => 1,
                'bandeira' => 'Visa',
                'tipo' => 3
            ),
            array(
                'id' => 2,
                'bandeira' => 'Master',
                'tipo' => 3
            ),
            array(
                'id' => 3,
                'bandeira' => 'Amex',
                'tipo' => 2
            ),
            array(
                'id' => 4,
                'bandeira' => 'ELO',
                'tipo' => 2
            )
        ));
    }
}
