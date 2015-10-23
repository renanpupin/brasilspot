<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\UsuarioPerfil;
use App\Http\Controllers\Controller;
use Hash;

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
        $usuario = User::create([
           'name' => $request['name'],
           'email' => $request['email'],
            'password' => Hash::make($request['email'])
        ]);

        UsuarioPerfil::create([
            'idUsuario' => $usuario->id,
            'idPerfilUsuario' => $request['perfis'],
            'isVendedor'=> $request['isVendedor']
        ]);

        return 'Usuario Registrado com sucesso!!';
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
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
