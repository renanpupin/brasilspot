<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PlanoController extends Controller
{

    public function index()
    {
        return view('Plano.Index');
    }


    public function create()
    {
        return view('Plano.Create');
    }


    public function store(Request $request)
    {
        Plano::create([
            'Nome' => $request['nome'],
            'Valor' => $request['valor'],
            'Descricao' =>  $request['descricao']
        ]);

        return "Plano Registrado com sucesso!!";
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
