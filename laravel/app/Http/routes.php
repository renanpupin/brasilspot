<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//routes for "Login"
Route::post('Login', ['as' =>'Login', 'uses' => 'LoginController@logar']);
Route::get('Login/', 'LoginController@index');
Route::get('Logout','LoginController@logout');

//routes for "reset password"
Route::get('Password/email', ['as'=>'Resetar', 'uses'=> 'PasswordController@getEmail']);
Route::post('Password/email', ['as'=>'ResetarPost','uses'=> 'PasswordController@postEmail']);

Route::get('Password/reset/{token}', 'PasswordController@getReset');
Route::post('Password/reset', 'PasswordController@postReset');

Route::get('RecuperarSenha', function () {
    return view('RecuperarSenha');
});

//check access
//Route::group(['middleware' => 'auth'], function () {

    Route::resource('Tag','TagController');
    Route::resource('PerfilUsuario','PerfilUsuarioController');
    //Route::resource('TipoVendedor','TipoVendedorController');
    //Route::resource('TipoEmpresa','TipoEmpresaController');
    //Route::resource('Plano','PlanoController');
    //Route::resource('Endereco','EnderecoController');
    //Route::resource('Telefone','TelefoneController');

    //routes for "Vendedor"
    Route::get('Solicitacoes/MapaVendedores', 'VendedorController@mapa');
    Route::resource('Vendedor','VendedorController');

    //routes for "MaterialPropaganda"
    Route::get('Solicitacoes/MaterialPropaganda/cadastrar', 'MaterialPropagandaController@create');
    Route::get('Solicitacoes/MaterialPropaganda/{id}', 'MaterialPropagandaController@show');
    Route::get('Solicitacoes/MaterialPropaganda', 'MaterialPropagandaController@index');
    Route::resource('MaterialPropaganda','MaterialPropagandaController');

    //routes for "ReportarErro" (somente cadastrar, detalhar e excluir)
    Route::get('Solicitacoes/ReportarErro', 'ErroController@create');
    //Route::resource('ReportarErro','ReclamacaoController');

    Route::get('Erros', 'ErroController@index');
    Route::get('Erros/{id}', 'ErroController@show');
    Route::resource('Erro','ErroController');

    //routes for "Reclamacoes"
    Route::get('Clientes/Reclamacoes', 'ReclamacaoController@index');
    Route::get('Clientes/Reclamacoes/cadastrar', 'ReclamacaoController@create');
    Route::get('Clientes/Reclamacoes/{id}', 'ReclamacaoController@show');
    Route::get('Clientes/Reclamacoes/visualizar/{id}', 'ReclamacaoController@visualizar');
    Route::resource('Reclamacao','ReclamacaoController');

    //routes for "Clientes"
    Route::get('Clientes/Atualizacoes', function () {
        return view('Cliente/Atualizacoes');
    });
Route::get('Clientes/VerAtualizacao/{id}', function () {
    return view('Cliente/VerAtualizacao');
});
    Route::post('Clientes/editar/{id}', 'ClienteController@update');
    Route::get('Clientes/editar/{id}', 'ClienteController@edit');
    Route::get('Clientes/AtualizarVencimento/{id}', 'ClienteController@atualizarVencimento');
    Route::get('Clientes/Gerenciar', 'ClienteController@index');
    Route::get('Clientes/Cadastrar', 'ClienteController@create');
    Route::post('Clientes/AtualizarVencimentoStore', ['as' => 'Cliente.atualizarVencimentoStore', 'uses' => 'ClienteController@atualizarVencimentoStore']);
    Route::resource('Clientes','ClienteController');

    //routes for "Plano"
    Route::get('Plano', 'PlanoController@index');

    //routes for "Meta"
    Route::get('Metas/{id}', 'MetaController@show');
    Route::get('Metas', 'MetaController@index');
    Route::get('Metas/cadastrar', 'MetaController@create');
    Route::post('Metas/editar/{id}', 'MetaController@update');
    Route::get('Metas/editar/{id}', 'MetaController@edit');
    Route::get('Metas/Historico', 'MetaController@historico');
    Route::get('Metas/Mensal', 'MetaController@mensal');
    Route::get('Metas/Ocasional', function () {
        return view('Meta/Ocasional');
    });
    Route::get('Metas/Equipe', function () {
        return view('Meta/Equipe');
    });
    Route::resource('Meta','MetaController');

    //routes for "Salario"
    Route::get('Salario/Consultar', 'SalarioController@consultar');
    Route::get('Salario/Historico', 'SalarioController@historico');
    Route::resource('Salario', 'SalarioController');


    //routes for "Categoria"
    Route::post('Categoria/editar/{id}', 'CategoriaController@update');
    Route::get('Categoria/editar/{id}', 'CategoriaController@edit');
    Route::get('Categoria/cadastrar', 'CategoriaController@create');
    Route::delete('Categoria/remover/{id}', ['as' =>'Categoria.remover', 'uses' => 'CategoriaController@destroy']);
    Route::resource('Categoria', 'CategoriaController');

    //routes for "Empresa"


    Route::post('Empresa/uploadFiles', 'EmpresaController@uploadFiles');

    Route::post('Empresa/editar/{id}', 'EmpresaController@update');
    Route::get('Empresa/editar/{id}', 'EmpresaController@edit');
    Route::get('Empresa/cadastrar', ['as' => 'Empresa.cadastrar','uses' => 'EmpresaController@create']);
    Route::resource('Empresa','EmpresaController');

    //routes for "Filiais"
    Route::post('Filial/editar/{id}', 'FilialController@update');
    Route::get('Filial/editar/{id}', 'FilialController@edit');
    Route::get('Filial/cadastrar', 'FilialController@create');
    Route::resource('Filial','FilialController');

    //routes for "Servicos"
    Route::post('Servico/editar/{id}', 'ServicoController@update');
    Route::get('Servico/editar/{id}', 'ServicoController@edit');
    Route::get('Servico/cadastrar', 'ServicoController@create');
    Route::resource('Servico','ServicoController');

    //routes for "Cartoes"
    Route::post('Cartao/editar/{id}', 'CartaoController@update');
    Route::get('Cartao/editar/{id}', 'CartaoController@edit');
    Route::get('Cartao/cadastrar', 'CartaoController@create');
    Route::resource('Cartao', 'CartaoController');

    //routes for "Fotos"
    Route::post('Foto/editar/{id}', 'FotoController@update');
    Route::get('Foto/editar/{id}', 'FotoController@edit');
    Route::get('Foto/cadastrar', 'FotoController@create');
    Route::resource('Foto', 'FotoController');

    //routes for "Usuarios"
    Route::post('Usuario/editar/{id}', 'UsuarioController@update');
    Route::get('Usuario/editar/{id}', 'UsuarioController@edit');
    Route::get('Usuario/cadastrar', 'UsuarioController@create');
    Route::get('Perfil', 'UsuarioController@editarSeuPerfil');
    Route::post('Perfil', 'UsuarioController@atualizarSeuPerfil');
    Route::resource('Usuario','UsuarioController');

    //routes for "Enderecos"
    Route::post('Endereco/editar/{id}', 'EnderecoController@update');
    Route::get('Endereco/editar/{id}', 'EnderecoController@edit');
    Route::get('Endereco/cadastrar', 'EnderecoController@create');
    Route::resource('Endereco','EnderecoController');


    //routes for "TiposEmpresas"
    Route::post('TipoEmpresa/editar/{id}', 'TipoEmpresaController@update');
    Route::get('TipoEmpresa/editar/{id}', 'TipoEmpresaController@edit');
    Route::get('TipoEmpresa/cadastrar', 'TipoEmpresaController@create');
    Route::resource('TipoEmpresa','TipoEmpresaController');

    //routes for "TiposCartoes"
    Route::post('TipoCartao/editar/{id}', 'TipoCartaoController@update');
    Route::get('TipoCartao/editar/{id}', 'TipoCartaoController@edit');
    Route::get('TipoCartao/cadastrar', 'TipoCartaoController@create');
    Route::delete('TipoCartao/remover/{id}', ['as' =>'TipoCartao.remover', 'uses' => 'TipoCartaoController@destroy']);
    Route::resource('TipoCartao', 'TipoCartaoController');


//});


//rotas admin além das rotas acima
Route::get('Comerciantes', function () {
    return view('Comerciante/ListarComerciantes');
});
Route::get('Dashboard', function () {
    return view('Admin/Dashboard');
});

//rotas vendedores

Route::get('NovaMensagem', function () {    //essa rota vai ter em vendedor e comerciante
    return view('Mensagem/Create');
});

Route::get('NovaEmpresa', function () {
    return Redirect::route('Empresa.cadastrar');
});

Route::get('SeuDesempenho', function () {
    return view('Vendedor/Desempenho');
});

Route::get('MapaVendas', function () {
    return view('Mapa/mapa');
});

//rotas que os comerciantes vão ver no menu
Route::get('Resumo', function () {
    if(Gate::allows('AcessoComerciante')) {
        return view('Comerciante/resumo');
    }
    return view('401');
});

Route::post('SuasFiliais/editar/{id}', 'FilialController@update');
Route::get('SuasFiliais/editar/{id}', 'FilialController@edit');
Route::get('SuasFiliais/cadastrar', 'FilialController@create');
Route::resource('SuasFiliais', 'FilialController@index');

Route::get('SuaEmpresa/Editar', 'EmpresaController@editar');

Route::get('SuaEmpresa/Cadastrar', 'EmpresaController@create');

Route::get('SuaEmpresa', function () {
    return view('Empresa/Detail');
});

Route::get('ServicosOferecidos', 'ServicoController@selecionar');

Route::get('SuaAssinatura/Upgrade/{id}', function () {
    return view('Comerciante/UpgradeAssinatura');
});

Route::get('SuaAssinatura/PagamentoTeste', function () {
    return view('Comerciante/paginaPagamentoTeste');
});

Route::get('SuaAssinatura/Downgrade/{id}', function () {
    return view('Comerciante/DowngradeAssinatura');
});

Route::get('SuaAssinatura/Cancelar/{id}', function () {
    return view('Comerciante/CancelarAssinatura');
});

Route::get('SuaAssinatura', function () {
    return view('Comerciante/Assinatura');
});

Route::get('Reclamar', function () {
    return view('Reclamacao/Create');
});

Route::get('ReportarErro', function () {
    return view('Erros/Create');
});

Route::get('SuasMensagens/responder/{id}', function () {
    return view('Mensagem/Responder');
});

Route::get('SuasMensagens', function () {
    return view('Mensagem/index');
});

//esse item no menu só aparece para quem assinar o plano de 39.90
Route::get('SuasPromocoes', function () {
    return view('Promocoes');
});


//SITE ROUTES
Route::get('Contato', function () {
    return view('contato');
});
//Route::post('Contato', function () {
//    return view('contatoSucesso');
//});

Route::get('Planos', function () {
    return view('planos');
});

Route::get('Politica', function () {
    return view('politica');
});

Route::get('Sobre', function () {
    return view('sobre');
});

Route::get('TrabalheConosco', function () {
    return view('trabalheConosco');
});

Route::get('Comercios', function () {
    return view('Comercios');
});

Route::get('Servicos', function () {
    return view('Servicos');
});

Route::get('Atracoes', function () {
    return view('Atracoes');
});



//Route::get('Empresas/encontre/{categorias}/{subcategoria?}', 'EmpresaController@filtroEmpresas');

Route::get('Empresas/pesquisarEmpresa', 'SiteController@pesquisarEmpresa');
Route::get('Empresas/pesquisarEndereco', 'SiteController@pesquisarEndereco');

/*rotas dos filtros*/
Route::get('Empresas/{filtros?}', 'SiteController@filtroEmpresas')->where('filtros', '(.*)');;


Route::get('Empresas/{id}', 'EmpresaController@visualizar');



Route::get('Categorias', 'CategoriaController@listarCategorias');

Route::get('categorias/{slug}', 'EmpresaController@listarPorCategoria');
//Route::get('/{slug}', 'SiteController@showSlug')->where('slug', '[A-Za-z-]+');

Route::get('Inicio', function () {
    return view('PesquisaEmpresa');
});

Route::get('/index', function () {
    return view('PesquisaEmpresa');
});

Route::get('/', function () {
    return redirect('Inicio');
});


