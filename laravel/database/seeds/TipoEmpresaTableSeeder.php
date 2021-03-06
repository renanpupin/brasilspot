<?php

use Illuminate\Database\Seeder;

class TipoEmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tiposEmpresas')->insert(array(
            array(
                'id' => 1,
                'tipo' => 'Comércio',
            ),
            array(
                'id' => 2,
                'tipo' => 'Serviço',
            ),
            array(
                'id' => 3,
                'tipo' => 'Atrações',
            ),
            array(
                'id' => 4,
                'tipo' => 'Profissionais',
            ),
        ));
    }
}
