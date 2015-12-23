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
        $this->call(TagTableSeeder::class);


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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('empresas')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

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
                'idUsuario' => 3,
                'idVendedor' => 2,
                'dataCadastro' => '03/11/2015',
            ),
            array(
                'id' => 2,
                'nomeEmpreendedor' => 'José da Silva',
                'razaoSocial' => 'José Pizzaria Ltda',
                'cpfCnpj' => '29.746.381/0001-34',
                'email' => 'pizzariajose@hotmail.com',
                'nomeFantasia' => 'Sorveteria Sorvetao',
                'slogan' => 'A melhor sorvete da cidade',
                'descricao' => 'A sorvete é a melhor da região',
                'horarioFuncionamento' => 'Segunda a sexta das 18:00 às 00:00',
                'atendeCasa' => 1,
                'linkSite' => 'www.sorv.com.br',
                'linkFacebook' => 'www.facebook.com/sorv',
                'idTipoEmpresa' => 1,
                'idTipoCartao' => 3,
                'idUsuario' => 3,
                'idVendedor' => 2,
                'dataCadastro' => '03/11/2015',
            ),
        ));

        DB::table('cartoesAceitos')->insert(array(
            array(
                'idEmpresa' => 1,
                'idCartao' => 1
            ),
            array(
                'idEmpresa' => 1,
                'idCartao' => 2
            ),
        ));

        DB::table('tagsEmpresas')->delete();
        DB::table('tagsEmpresas')->insert(array(
            array(
                'idEmpresa' => 1,
                'idTag' => 1
            ),
            array(
                'idEmpresa' => 1,
                'idTag' => 2
            ),
            array(
                'idEmpresa' => 1,
                'idTag' => 3
            ),
            array(
                'idEmpresa' => 1,
                'idTag' => 4
            ),
            array(
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

        DB::table('whatsApp')->insert(array(
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
            array(
                'id' => 2,
                'idEmpresa' => 1,
                'idEndereco' => 1,
                'idTelefone' => 1,
                'idWhatsApp' => 1,
                'isPrincipal' => 0
            ),
            array(
                'id' => 3,
                'idEmpresa' => 1,
                'idEndereco' => 1,
                'idTelefone' => 1,
                'idWhatsApp' => 1,
                'isPrincipal' => 0
            ),
            array(
                'id' => 4,
                'idEmpresa' => 2,
                'idEndereco' => 1,
                'idTelefone' => 1,
                'idWhatsApp' => 1,
                'isPrincipal' => 1
            ),
        ));

        $this->call(AssinaturasTableSeeder::class);

    }
}
