<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TipoEmpresaController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('TipoEmpresa.Create');
    }


    public function store(Request $request)
    {
        \App\TipoEmpresa::create([
           'Tipo' => $request['tipo']
        ]);

        return "Tipo Empresa Registrada com sucesso!!";
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
