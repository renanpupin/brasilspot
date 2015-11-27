<?php

use Illuminate\Database\Seeder;

class PerfilUsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfisUsuarios')->delete();

        DB::table('perfisUsuarios')->insert(array(
            array(
                'id' => 1,
                'tipo' => 'Administrador',
            ),
            array(
                'id' => 2,
                'tipo' => 'Vendedor',
            ),
            array(
                'id' => 3,
                'tipo' => 'Comerciante',''
            ),
        ));
    }
}
