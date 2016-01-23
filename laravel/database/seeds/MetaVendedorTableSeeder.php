<?php

use Illuminate\Database\Seeder;

class MetaVendedorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('metasvendedor')->delete();

        DB::table('metasvendedor')->insert(array(
            array(
                'id' => 1,
                'idMeta' => 1,
                'idVendedor' => 1
            ),
            array(
                'id' => 2,
                'idMeta' => 2,
                'idVendedor' => 1
            ),
            array(
                'id' => 3,
                'idMeta' => 3,
                'idVendedor' => 1
            ),
            array(
                'id' => 4,
                'idMeta' => 1,
                'idVendedor' => 2
            ),
            array(
                'id' => 5,
                'idMeta' => 2,
                'idVendedor' => 2
            ),
        ));
    }
}
