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

Route::group(['middleware' => 'auth'], function () {
//routes for "Categoria"
    Route::post('Categoria/editar/{id}', 'CategoriaController@update');
    Route::get('Categoria/editar/{id}', 'CategoriaController@edit');
    Route::get('Categoria/cadastrar', 'CategoriaController@create');
    Route::resource('Categoria', 'CategoriaController');
});

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
Route::get('Login/logout/','LoginController@logout');

//routes for "reset password"
Route::get('Password/email', 'PasswordController@getEmail');
Route::post('Password/email', 'PasswordController@postEmail');

Route::get('Password/reset/{token}', 'PasswordController@getReset');
Route::post('Password/reset', 'PasswordController@postReset');

//routes for "Usuario"
Route::post('Usuario/editar/{id}', 'UsuarioController@update');
Route::get('Usuario/editar/{id}', 'UsuarioController@edit');
Route::get('Usuario/cadastrar', 'UsuarioController@create');
Route::resource('Usuario','UsuarioController');

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

Route::get('Sobre', function () {
    return view('sobre');
});

Route::get('/', function () {
    return view('index');
});
Route::get('/index', function () {
    return view('index');
});

// Authentication routes...
Route::get('login', ['as' =>'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('login', ['as' =>'login', 'uses' => 'LoginController@logar']);
//Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
// Registration routes...
Route::get('register', ['as' =>'register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('register', ['as' =>'register', 'uses' => 'Auth\AuthController@postRegister']);
// Password reset link request routes...
Route::get('forgot', ['as' =>'password/email', 'uses' => 'Auth\PasswordController@getEmail']);
Route::post('forgot', ['as' =>'password/email', 'uses' => 'Auth\PasswordController@postEmail']);
// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');