<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Empresa;
use App\Filial;
use App\Cliente;
use DB;
use App\Http\Controllers\Controller;
use Session;

class AdminController extends Controller
{
    public function index()
    {
        $cartoes = Cartao::all();
        return view('Cartao.Index')->with('cartoes',$cartoes);
    }


    public function create()
    {
        return view('Cartao.Create');
    }


    public function store(Request $request)
    {
        $regras = array(
            'bandeira' => 'required|string',
            'tipo' => 'required'
        );

        $mensagens = array(
            'required' => 'O campo :attribute deve ser preenchido.'
        );

        $this->validate($request, $regras, $mensagens);


        Cartao::Create([
            'bandeira' => $request['bandeira'],
            'tipo' => $request['tipo']
        ]);

        Session::flash('flash_message', 'Cartão adicionado com sucesso!');

        return redirect()->back();
    }

    public function show($id)
    {
        $cartao = Cartao::find($id);
        return view('Cartao.Detail')->with('cartao',$cartao);
    }


    public function edit($id)
    {
        $cartao = Cartao::find($id);
        return view('Cartao.Edit')->with('cartao',$cartao);
    }


    public function update(Request $request, $id)
    {
        $cartao = Cartao::find($id);

        $regras = array(
            'bandeira' => 'required|string',
            'tipo' => 'required'
        );

        $mensagens = array(
            'required' => 'O campo :attribute deve ser preenchido.'
        );

        $this->validate($request, $regras, $mensagens);


        $cartao->bandeira = $request['bandeira'];
        $cartao->tipo = $request['tipo'];
        $cartao->save();

        Session::flash('flash_message', 'Cartão alterado com sucesso!');

        return redirect()->back();
    }

    public function dashboard()
    {

        $numero_clientes = Empresa::count();
        $numero_filiais = Filial::count();


        $numero_clientes_mes = Empresa::where( DB::raw('MONTH(dataCadastro)'), '=', date('n') )->count();

        return view('Admin/Dashboard')->with('numero_clientes',$numero_clientes)->with('numero_filiais',$numero_filiais)->with('numero_clientes_mes',$numero_clientes_mes);
    }
}
