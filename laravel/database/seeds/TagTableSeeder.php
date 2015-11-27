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
        ));

        DB::table('tags')->insert(array(
            array(
                'id' => 2,
                'nome' => 'Pizza Gostosa',
            ),
        ));

        DB::table('tags')->insert(array(
            array(
                'id' => 3,
                'nome' => 'Pizzaria Avenida Paulista',
            ),
        ));
    }
}
