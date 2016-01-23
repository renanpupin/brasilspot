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

        DB::table('cartoes')->delete();

        DB::table('cartoes')->insert(array(
            array(
                'id' => 1,
                'bandeira' => 'Visa',
            ),
            array(
                'id' => 2,
                'bandeira' => 'Master',
            ),
            array(
                'id' => 3,
                'bandeira' => 'Amex',
            ),
            array(
                'id' => 4,
                'bandeira' => 'ELO',
            ),
        ));
    }
}
