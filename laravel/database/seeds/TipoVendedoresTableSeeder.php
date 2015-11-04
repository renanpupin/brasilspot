<?php

use Illuminate\Database\Seeder;

class TipoVendedoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tiposVendedores')->delete();

        DB::table('tiposVendedores')->insert(array(
            array(
                'id' => 1,
                'tipo' => 'alfa',
            ),
            array(
                'id' => 2,
                'tipo' => 'beta',
            )
        ));
    }
}
