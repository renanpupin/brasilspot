<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->delete();

        DB::table('tags')->insert(array(
            array(
                'id' => 1,
                'nome' => 'Pizzaria do José',
            ),
            array(
                'id' => 2,
                'nome' => 'Pizza Gostosa',
            ),
            array(
                'id' => 3,
                'nome' => 'Pizzaria Avenida Paulista',
            ),
        ));

        DB::table('tags')->insert(array(
            array(
                'id' => 4,
                'nome' => 'Canil Brasília',
            ),
            array(
                'id' => 5,
                'nome' => 'Pet Shop Rua Brasil',
            ),
        ));
    }
}
