<?php

use Illuminate\Database\Seeder;

class TipoMetaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tiposMeta')->delete();

        //administradores
        DB::table('tiposMeta')->insert(array(
            array(
                'id' => 1,
                'descricao' => 'MENSAL'
            ),
            array(
                'id' => 2,
                'descricao' => 'OCASIONAL',
            ),
        ));
    }
}
