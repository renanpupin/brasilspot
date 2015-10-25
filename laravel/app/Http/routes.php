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


Route::resource('Cartao','CartaoController');
Route::resource('Endereco','EnderecoController');
Route::resource('Foto','FotoController');
Route::resource('Meta','MetaController');
Route::resource('Plano','PlanoController');
Route::resource('Tag','TagController');
Route::resource('Telefone','TelefoneController');
Route::resource('Vendedor','VendedorController');
Route::resource('PerfilUsuario','PerfilUsuarioController');
Route::resource('TipoVendedor','TipoVendedorController');
Route::resource('TipoEmpresa','TipoEmpresaController');

//routes for "Categoria"
Route::post('Categoria/editar/{id}', 'CategoriaController@update');
Route::get('Categoria/editar/{id}', 'CategoriaController@edit');
Route::get('Categoria/cadastrar', 'CategoriaController@create');
Route::resource('Categoria','CategoriaController');

//routes for "Empresa"
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


//routes for "Login"
Route::post('Login/logar/', 'LoginController@logar');
Route::get('Login/', 'LoginController@index');
Route::resource('Login','LoginController');



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

Route::get('Inicio', function () {
    return view('index');
});

Route::get('/', function () {
    return redirect('Inicio');
});
