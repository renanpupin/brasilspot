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
    public function gerenciar()
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

}
