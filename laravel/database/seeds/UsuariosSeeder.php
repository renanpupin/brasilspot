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
        DB::table('planos')->delete();
        DB::table('metas')->delete();
        DB::table('tiposVendedores')->delete();
        DB::table('comerciantes')->delete();
        DB::table('vendedores')->delete();
        DB::table('users')->delete();
        DB::table('perfisUsuarios')->delete();

        $this->call(PerfilUsuarioTableSeeder::class);

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
            )
        ));

        //vendedores
        DB::table('users')->insert(array(
            array(
                'id' => 3,
                'name' => 'Vendedor Alfa',
                'email' => 'alfa@brasilspot.com',
                'password' => bcrypt('spot123'),
                'idPerfilUsuario' => 2, //vendedor
            ),
            array(
                'id' => 4,
                'name' => 'Vendedor Beta',
                'email' => 'beta@brasilspot.com',
                'password' => bcrypt('spot123'),
                'idPerfilUsuario' => 2, //vendedor
            ),
        ));

        $this->call(VendedorTableSeeder::class);

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
            )
        ));

        $this->call(ComercianteTableSeeder::class);
    }
}
