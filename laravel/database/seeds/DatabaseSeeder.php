<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('cartoes')->delete();
        DB::table('tiposcartoes')->delete();
        DB::table('categoriasempresas')->delete();
        DB::table('categorias')->delete();
        DB::table('tiposempresas')->delete();
        DB::table('servicosempresas')->delete();
        DB::table('servicos')->delete();
        DB::table('perfisUsuarios')->delete();
        DB::table('tiposvendedores')->delete();
        DB::table('comerciantes')->delete();
        DB::table('vendedores')->delete();
        DB::table('users')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call(CartaoTableSeeder::class);
        $this->call(TipoEmpresaTableSeeder::class);
        $this->call(TipoCartaoTableSeeder::class);
        $this->call(CategoriaTableSeeder::class);
        $this->call(ServicoTableSeeder::class);
        $this->call(PerfilUsuarioTableSeeder::class);
        $this->call(UsuariosSeeder::class);
        $this->call(TipoVendedoresTableSeeder::class);
        $this->call(VendedorTableSeeder::class);
        $this->call(ComercianteTableSeeder::class);

        Model::reguard();
    }
}
