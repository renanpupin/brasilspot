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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('tags')->delete();

        DB::table('tags')->insert(array(
            array(
                'id' => 1,
                'nome' => 'pizza'
            ),
            array(
                'id' => 2,
                'nome' => 'pizzaria delivery'
            ),
            array(
                'id' => 3,
                'nome' => 'Pizzaria Avenida Paulista',
            ),
            array(
                'id' => 4,
                'nome' => 'Canil Brasília',
            ),
            array(
                'id' => 5,
                'nome' => 'Pet Shop Rua Brasil',
            )
        ));

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
