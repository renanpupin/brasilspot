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
        DB::table('vendedores')->delete();

        $this->call(MetaTableSeeder::class);
        $this->call(TipoVendedoresTableSeeder::class);

        //administradores
        DB::table('vendedores')->insert(array(
            array(
                'id' => 1,
                'idUsuario' => 3,
                'idTipo' => 1,    //alfa
                'idMeta' => 1,
                'idVendedorPai' => null
            ),
            array(
                'id' => 2,
                'idUsuario' => 4,
                'idTipo' => 2,    //beta
                'idMeta' => 2,
                'idVendedorPai' => 1
            ),
        ));
    }
}
