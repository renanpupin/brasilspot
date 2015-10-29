<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Auth;

class ClienteController extends Controller
{
    public function index()
    {

        return view('Cliente.Gerenciar');
    }

    public function create()
    {
        $perfis = \App\PerfilUsuario::all()->lists('tipo','id');

        return View('Cliente.create')
            ->with('perfis',$perfis);
    }

    public function store()
    {
        //return View('Cliente.Create');
    }

    public function show($id)
    {
        return view('Cliente.Detail');
    }


    public function edit($id)
    {
        $perfis = \App\PerfilUsuario::all()->lists('tipo','id');

        return View('Cliente.Edit')
            ->with('perfis',$perfis);
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function atualizarVencimento($id)
    {
        return View('Cliente.AtualizarVencimento');
    }

}
