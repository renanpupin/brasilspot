<?php

use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categorias')->delete();

        DB::table('categorias')->insert(array(
            array(
                'id' => 1,
                'nome' => 'Alimentos e Bebidas',
                'idTipoCategoria' => 1,
                'idCategoriaPai' => null
            ),
            array(
                'id' => 2,
                'nome' => 'Supermercado',
                'idTipoCategoria' => 1,
                'idCategoriaPai' => 1
            ),
            array(
                'id' => 3,
                'nome' => 'Padaria',
                'idTipoCategoria' => 1,
                'idCategoriaPai' => 1
            ),
            array(
                'id' => 4,
                'nome' => 'Animais',
                'idTipoCategoria' => 2,
                'idCategoriaPai' => null
            ),
            array(
                'id' => 5,
                'nome' => 'Canis',
                'idTipoCategoria' => 2,
                'idCategoriaPai' => 4
            ),
            array(
                'id' => 6,
                'nome' => 'Rações',
                'idTipoCategoria' => 2,
                'idCategoriaPai' => 4
            ),
        ));
    }
}
