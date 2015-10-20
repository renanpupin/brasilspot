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


Route::resource('Empresa','EmpresaController');
Route::resource('Cartao','CartaoController');
Route::resource('Categoria','CategoriaController');
Route::resource('Endereco','EnderecoController');
Route::resource('Foto','FotoController');
Route::resource('Meta','MetaController');
Route::resource('Plano','PlanoController');
Route::resource('Tag','TagController');
Route::resource('Telefone','TelefoneController');
Route::resource('Usuario','UsuarioController');
Route::resource('Vendedor','VendedorController');
Route::resource('PerfilUsuario','PerfilUsuarioController');
Route::resource('TipoVendedor','TipoVendedorController');
Route::resource('TipoEmpresa','TipoEmpresaController');


//routes for "Servicos"
Route::post('Servico/editar/{id}', 'ServicoController@update');
Route::get('Servico/editar/{id}', 'ServicoController@edit');
Route::get('Servico/cadastrar', 'ServicoController@create');
Route::resource('Servico','ServicoController');


//Route::get('/', function () {
//    return view('welcome');
//});
