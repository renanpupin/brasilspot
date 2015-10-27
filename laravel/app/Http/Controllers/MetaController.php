<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MetaController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('Meta.Create');
    }


    public function store(Request $request)
    {
        \App\Meta::create([
           'NumeroEmpresas' => $request['numeroEmpresas']
        ]);

        return "Meta Registrada com sucesso!!";
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

    public function mensal()
    {
        return view('Meta.Mensal');
    }


    public function historico()
    {
        return view('Meta.Historico');
    }
}
