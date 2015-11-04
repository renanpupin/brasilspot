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
                'id_vendedor' => 1,
                'id_usuario' => 5,
                'id_plano' => 1,
                'data_vencimento' => '20/11/2015'
            ),
            array(
                'id' => 2,
                'id_vendedor' => 2,
                'id_usuario' => 6,
                'id_plano' => 2,
                'data_vencimento' => '02/11/2015'
            ),
        ));
    }
}
