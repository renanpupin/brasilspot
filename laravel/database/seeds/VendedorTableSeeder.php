<?php

use Illuminate\Database\Seeder;

class VendedorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //administradores
        DB::table('vendedores')->insert(array(
            array(
                'id' => 1,
                'idUsuario' => 4,
                'idTipo' => 1,    //alfa
                'idVendedorPai' => null
            )
        ));
    }
}
