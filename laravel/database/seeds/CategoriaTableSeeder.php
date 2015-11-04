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
                'idCategoriaPai' => null
            ),
            array(
                'id' => 2,
                'nome' => 'Supermercado',
                'idCategoriaPai' => 1
            ),
            array(
                'id' => 3,
                'nome' => 'Padaria',
                'idCategoriaPai' => 1
            ),
            array(
                'id' => 4,
                'nome' => 'Animais',
                'idCategoriaPai' => null
            ),
            array(
                'id' => 5,
                'nome' => 'Canis',
                'idCategoriaPai' => 4
            ),
            array(
                'id' => 6,
                'nome' => 'Rações',
                'idCategoriaPai' => 4
            ),
        ));
    }
}
