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
        DB::table('categorias')->insert(array(
            array(
                'id' => 1,
                'nome' => 'Alimentos e Bebidas',
                'slug' => 'alimentos-e-bebidas',
                'idTipoCategoria' => 1,
                'idCategoriaPai' => null
            ),
            array(
                'id' => 2,
                'nome' => 'Supermercado',
                'slug' => 'supermercado',
                'idTipoCategoria' => 1,
                'idCategoriaPai' => 1
            ),
            array(
                'id' => 3,
                'nome' => 'Padaria',
                'slug' => 'padaria',
                'idTipoCategoria' => 1,
                'idCategoriaPai' => 1
            ),
            array(
                'id' => 4,
                'nome' => 'Comida Italiana',
                'slug' => 'comida-italiana',
                'idTipoCategoria' => 1,
                'idCategoriaPai' => 1
            ),
            array(
                'id' => 5,
                'nome' => 'Comida Japonesa',
                'slug' => 'comida-japonesa',
                'idTipoCategoria' => 1,
                'idCategoriaPai' => 1
            ),
            array(
                'id' => 6,
                'nome' => 'Animais',
                'slug' => 'animais',
                'idTipoCategoria' => 2,
                'idCategoriaPai' => null
            ),
            array(
                'id' => 7,
                'nome' => 'Canis',
                'slug' => 'canis',
                'idTipoCategoria' => 2,
                'idCategoriaPai' => 6
            ),
            array(
                'id' => 8,
                'nome' => 'Rações',
                'slug' => 'racoes',
                'idTipoCategoria' => 2,
                'idCategoriaPai' => 6
            ),
        ));
    }
}
