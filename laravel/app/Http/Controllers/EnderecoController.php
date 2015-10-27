<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Endereco;

class EnderecoController extends Controller
{

    public function index()
    {
        $enderecos = Endereco::all();
        return view('Endereco.Index')->with('enderecos',$enderecos);
    }


    public function create()
    {
        return view('Endereco.Create');
    }


    public function store(Request $request)
    {
        //
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
