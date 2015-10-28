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
Route::get('Password/email', 'PasswordController@getEmail');
Route::post('Password/email', 'PasswordController@postEmail');

Route::get('Password/reset/{token}', 'PasswordController@getReset');
Route::post('Password/reset', 'PasswordController@postReset');

Route::get('RecuperarSenha', function () {
    return view('RecuperarSenha');
});

//check access
Route::group(['middleware' => 'auth'], function () {

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
    Route::resource('Reclamacao','ReclamacaoController');

    //routes for "Clientes"
    Route::post('Clientes/editar/{id}', 'ClienteController@update');
    Route::get('Clientes/editar/{id}', 'ClienteController@edit');
    Route::get('Clientes/Gerenciar', 'ClienteController@index');
    Route::get('Clientes/cadastrar', 'ClienteController@create');
    Route::resource('Clientes','ClienteController');

    //routes for "Plano"
    Route::get('Plano', 'PlanoController@index');

    //routes for "Meta"
    Route::get('Metas/Historico', 'MetaController@historico');
    Route::get('Metas/Mensal', 'MetaController@mensal');
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
    Route::get('upload', function() {
        return View::make('Empresa.Upload');
    });
    Route::post('apply/upload', 'EmpresaController@upload');

    Route::post('Empresa/editar/{id}', 'EmpresaController@update');
    Route::get('Empresa/editar/{id}', 'EmpresaController@edit');
    Route::get('Empresa/cadastrar', 'EmpresaController@create');
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
    Route::get('Perfil', 'UsuarioController@editarPerfil');
    Route::post('Perfil', 'UsuarioController@atualizarPerfil');
    Route::resource('Usuario','UsuarioController');

    //routes for "Enderecos"
    Route::post('Endereco/editar/{id}', 'EnderecoController@update');
    Route::get('Endereco/editar/{id}', 'EnderecoController@edit');
    Route::get('Endereco/cadastrar', 'EnderecoController@create');
    Route::resource('Endereco','EnderecoController');
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

Route::get('Empresas/{id}', 'EmpresaController@visualizar');

Route::get('Empresas', function () {
    return view('index');
});

Route::get('Inicio', function () {
    return view('PesquisaEmpresa');
});

Route::get('/index', function () {
    return view('PesquisaEmpresa');
});

Route::get('/', function () {
    return redirect('Inicio');
});


