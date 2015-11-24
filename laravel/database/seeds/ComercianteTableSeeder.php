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
        DB::table('comerciantes')->delete();

        $this->call(PlanoTableSeeder::class);

        //administradores
        DB::table('comerciantes')->insert(array(
            array(
                'id' => 1,
                'idVendedor' => 1,
                'idUsuario' => 5
            ),
            array(
                'id' => 2,
                'id_vendedor' => 2,
                'id_usuario' => 6
            ),
        ));
    }
}
