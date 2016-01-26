<?php

use Illuminate\Database\Seeder;

class ComercianteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //administradores
        DB::table('comerciantes')->insert(array(
            array(
                'id' => 1,
                'idVendedor' => 1,
                'idUsuario' => 5
            ),
            array(
                'id' => 2,
                'id_vendedor' => 1,
                'id_usuario' => 6
            ),
            array(
                'id' => 3,
                'id_vendedor' => 1,
                'id_usuario' => 7
            )
        ));
    }
}
