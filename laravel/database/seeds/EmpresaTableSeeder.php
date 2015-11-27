<?php

use Illuminate\Database\Seeder;

class EmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //cartoes
        $this->call(CartaoTableSeeder::class);
        DB::table('cartoesAceitos')->delete();

        //tags
        DB::table('tags')->delete();
        DB::table('tagsEmpresas')->delete();

        //servicos
        $this->call(ServicoTableSeeder::class);

        //categorias
        $this->call(CategoriaTableSeeder::class);

        //tipo empresa
        $this->call(TipoEmpresaTableSeeder::class);

        //tipo cartao
        $this->call(TipoCartaoTableSeeder::class);

        //filiais
        DB::table('filiais')->delete();
        DB::table('enderecos')->delete();
        DB::table('telefones')->delete();
        DB::table('whatsApp')->delete();

        //empresa
        DB::table('empresas')->delete();
        DB::table('empresasPendentes')->delete();

        $this->call(EnderecoTableSeeder::class);

        DB::table('empresas')->insert(array(
            array(
                'id' => 1,
                'nomeEmpreendedor' => 'José da Silva',
                'razaoSocial' => 'José Pizzaria Ltda',
                'cpfCnpj' => '29.746.381/0001-34',
                'email' => 'pizzariajose@hotmail.com',
                'nomeFantasia' => 'Pizzaria José',
                'slogan' => 'A melhor pizza da cidade',
                'descricao' => 'A Pizzaria Jose é a melhor da região',
                'horarioFuncionamento' => 'Segunda a sexta das 18:00 às 00:00',
                'atendeCasa' => 1,
                'linkSite' => 'www.pizzariajose.com.br',
                'linkFacebook' => 'www.facebook.com/pizzariajose',
                'idTipoEmpresa' => 1,
                'idTipoCartao' => 3,
                'idUsuarioEmpresa' => 5,
                'idVendedorEmpresa' => 4,
                'dataCadastro' => '03/11/2015',
            ),
        ));

        DB::table('cartoesAceitos')->insert(array(
            array(
                'id' => 1,
                'idEmpresa' => 1,
                'idCartao' => 1
            ),
            array(
                'id' => 2,
                'idEmpresa' => 1,
                'idCartao' => 2
            ),
        ));
        DB::table('tags')->insert(array(
            array(
                'id' => 1,
                'nome' => 'pizza'
            ),
            array(
                'id' => 2,
                'nome' => 'pizzaria delivery'
            ),
            array(
                'id' => 2,
                'nome' => 'pizzaria jose'
            ),
            array(
                'id' => 3,
                'nome' => 'pizza são paulo'
            ),
            array(
                'id' => 4,
                'nome' => 'pizza avenida paulista'
            ),
            array(
                'id' => 5,
                'nome' => 'pizza barata'
            ),
        ));


        DB::table('tagsEmpresas')->insert(array(
            array(
                'id' => 1,
                'idEmpresa' => 1,
                'idTag' => 1
            ),
            array(
                'id' => 2,
                'idEmpresa' => 1,
                'idTag' => 2
            ),
            array(
                'id' => 3,
                'idEmpresa' => 1,
                'idTag' => 3
            ),
            array(
                'id' => 4,
                'idEmpresa' => 1,
                'idTag' => 4
            ),
            array(
                'id' => 5,
                'idEmpresa' => 1,
                'idTag' => 5
            ),
        ));

        DB::table('telefones')->insert(array(
            array(
                'id' => 1,
                'numero' => '(011)3661-9999'
            ),
        ));

        DB::table('whatsapp')->insert(array(
            array(
                'id' => 1,
                'numero' => '(011)9999-9999'
            ),
        ));
        DB::table('filiais')->insert(array(
            array(
                'id' => 1,
                'idEmpresa' => 1,
                'idEndereco' => 1,
                'idTelefone' => 1,
                'idWhatsApp' => 1,
                'isPrincipal' => 1
            ),
        ));
    }
}
