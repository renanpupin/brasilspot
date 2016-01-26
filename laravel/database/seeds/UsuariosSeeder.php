<?php

use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //administradores
        DB::table('users')->insert(array(
            array(
                'id' => 1,
                'name' => 'Renan',
                'email' => 'renan@brasilspot.com',
                'password' => bcrypt('spot123'),
                'idPerfilUsuario' => 1, //admin
            ),
            array(
                'id' => 2,
                'name' => 'Alisson',
                'email' => 'alisson@brasilspot.com',
                'password' => bcrypt('spot123'),
                'idPerfilUsuario' => 1, //admin
            ),
            array(
                'id' => 3,
                'name' => 'Valter',
                'email' => 'valter@brasilspot.com',
                'password' => bcrypt('spot123'),
                'idPerfilUsuario' => 1, //admin
            )
        ));

        //vendedores
        DB::table('users')->insert(array(
            array(
                'id' => 4,
                'name' => 'Vendedor Spot',
                'email' => 'vendedorspot@brasilspot.com',
                'password' => bcrypt('spot123'),
                'idPerfilUsuario' => 2, //vendedor
            )
        ));

        //comerciantes
        DB::table('users')->insert(array(
            array(
                'id' => 5,
                'name' => 'Comerciante 1',
                'email' => 'comerciante1@brasilspot.com',
                'password' => bcrypt('spot123'),
                'idPerfilUsuario' => 3, //comerciante
            ),
            array(
                'id' => 6,
                'name' => 'Comerciante 2',
                'email' => 'comerciante2@brasilspot.com',
                'password' => bcrypt('spot123'),
                'idPerfilUsuario' => 3, //comerciante
            ),
            array(
                'id' => 7,
                'name' => 'Comerciante 3',
                'email' => 'comerciante3@brasilspot.com',
                'password' => bcrypt('spot123'),
                'idPerfilUsuario' => 3, //comerciante
            )
        ));
    }
}
