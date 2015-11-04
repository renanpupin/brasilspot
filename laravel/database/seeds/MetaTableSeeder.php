<?php

use Illuminate\Database\Seeder;

class MetaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('metas')->delete();

        //administradores
        DB::table('metas')->insert(array(
            array(
                'id' => 1,
                'numeroEmpresas' => 15
            ),
            array(
                'id' => 2,
                'numeroEmpresas' => 30
            ),
        ));
    }
}
