<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\UsuarioPerfil;
use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        $perfis = \App\PerfilUsuario::all()->lists('tipo','id');

        return View('Usuario.create')
            ->with('perfis',$perfis);
    }


    public function store(Request $request)
    {

        $regras = array(
            'email' => 'required|string',
            'password' =>'required',
            'name' => 'required',
            'perfis' => 'required|integer',
            'isVendedor' => 'boolean'
        );
        $mensagens = array(
            'required' => 'O campo :attribute deve ser preenchido.'
        );

        $this->validate($request, $regras, $mensagens);

        $usuario = User::create([
           'name' => $request['name'],
           'email' => $request['email'],
           'password' => Hash::make($request['password']),
           'idPerfilUsuario' => $request['perfis'],
           'isVendedor'=> $request['isVendedor']=='1'?'1':'0'
        ]);

        Session::flash('flash_message', 'Usuário adicionada com sucesso!');

        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function editarPerfil()
    {
        return View('Usuario.EditarPerfil');
    }



    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
