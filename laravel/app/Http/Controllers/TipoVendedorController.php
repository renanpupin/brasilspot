<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TipoVendedorController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('TipoVendedor.Create');
    }


    public function store(Request $request)
    {
        \App\TipoVendedor::create([
           'Tipo' => $request['tipo']
        ]);

        return "Tipo Vendedor Registrado com sucesso!!";
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
