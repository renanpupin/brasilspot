<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PerfilUsuarioController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('PerfilUsuario.Create');
    }


    public function store(Request $request)
    {
        \App\PerfilUsuario::create([
           'Tipo' => $request['tipo']
        ]);
        return 'Perfil Usuario registrada!!';
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
