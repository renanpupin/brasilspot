<?php

use Illuminate\Database\Seeder;

class AssinaturasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('assinaturas')->delete();
        DB::table('assinaturasFiliais')->delete();

        DB::table('assinaturas')->insert(array(
            array(
                'id' => 1,
                'idPlano' => 1,
                'dataVencimento' => '20/02/2016',
                'idComerciante' => 1
            ),
            array(
                'id' => 2,
                'idPlano' => 1,
                'dataVencimento' => '20/02/2016',
                'idComerciante' => 1
            ),
            array(
                'id' => 3,
                'idPlano' => 1,
                'dataVencimento' => '20/02/2016',
                'idComerciante' => 1
            ),
            array(
                'id' => 4,
                'idPlano' => 2,
                'dataVencimento' => '20/02/2016',
                'idComerciante' => 1
            ),
        ));


        DB::table('assinaturasFiliais')->insert(array(
            array(
                'id' => 1,
                'idAssinatura' => 1,
                'idFilial' => 1
            ),
            array(
                'id' => 2,
                'idAssinatura' => 2,
                'idFilial' => 2
            ),
            array(
                'id' => 3,
                'idAssinatura' => 3,
                'idFilial' => 3
            ),
            array(
                'id' => 4,
                'idAssinatura' => 4,
                'idFilial' => 4
            ),
        ));


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
