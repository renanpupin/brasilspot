<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        $perfis = \App\PerfilUsuario::all();
        $perfisSelect = array();
        foreach($perfis as $perfil)
        {
            $perfisSelect[$perfil->Id] = $perfil->Tipo;
        }
        return View('Usuario.create')
            ->with('perfis',$perfisSelect);
    }


    public function store(Request $request)
    {
        \App\Usuario::create([
           'Nome' => $request['nome'],
           'Email' => $request['email'],
           'IdPerfil' => $request['perfis'],
           'IsVendedor' => $request['isVendedor']
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
