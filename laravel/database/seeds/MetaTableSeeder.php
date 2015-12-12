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

        $this->call(TipoMetaTableSeeder::class);

        //administradores
        DB::table('metas')->insert(array(
            array(
                'id' => 1,
                'nome' => 'Meta Mensal',
                'recompensa' => 50,
                'numeroAssinaturas' => 15,
                'idTipoMeta' => 1
            ),
            array(
                'id' => 2,
                'nome' => 'Meta de Ano Novo',
                'recompensa' => 100,
                'numeroAssinaturas' => 30,
                'idTipoMeta' => 2
            ),
        ));
    }
}
