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
        $regras = array(
        'endereco' => 'required|string',
        'bairro' => 'required|string',
        'cidade' => 'required|string',
        'estado' => 'required|string',
        'cep' => 'string',
        'lat' => 'string',
        'lon' => 'string');

        $mensagens = array(
            'required' => 'O campo :attribute deve ser preenchido.',
            'string' => 'O campo :attribute deve ser texto.'
        );

        $this->validate($request,$regras,$mensagens);

        Endereco::create([
            'endereco' => $request['endereco'],
            'bairro' => $request['bairro'],
            'cidade' => $request['cidade'],
            'estado' => $request['estado'],
            'cep' => $request['cep'],
            'lat' => $request['lat'],
            'lon' => $request['lon']
        ]);

        Session::flash('flash_message', 'Enderço adicionado com sucesso!');

        return redirect()->back();
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
