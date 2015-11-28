<?php

namespace App\Http\Controllers;

use App\Reclamacao;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Session;
use Input;
use Validator;
use Redirect;
use Auth;
use Gate;
use App\Http\Controllers\Controller;

class ReclamacaoController extends Controller
{

    public function index()
    {
//        $reclamacoes = Reclamacao::all()->load('Usuario');
//
//        if (Gate::allows('AcessoVendedor')) {
//            return view('Reclamacao.IndexVendedor')->with('reclamacoes',$reclamacoes);
//        }
//        if (Gate::allows('AcessoAdministrador')) {
//            return view('Reclamacao.IndexAdministrador')->with('reclamacoes',$reclamacoes);
//        }
    }

    public function indexComerciante()
    {
        if(Gate::allows('AcessoComerciante'))
        {
            $usuarioLogado = Auth::User();
            $reclamacoes = Reclamacao::whereHas('Usuario.PerfilUsuario', function($query){
                $query->where('tipo','=','Comerciante');
            })->where('idUsuario','=',$usuarioLogado->id)->get();

            return view('Reclamacao.IndexComerciante')->with('reclamacoes',$reclamacoes);
        }

        if (Gate::allows('AcessoAdministrador')) {
            $reclamacoes = Reclamacao::whereHas('Usuario.PerfilUsuario', function($query){
                $query->where('tipo','=','Comerciante');
            })->get();

            return view('Reclamacao.IndexComerciante')->with('reclamacoes',$reclamacoes);
        }
    }

    public function indexVendedor()
    {


        if (Gate::allows('AcessoVendedor')) {
            $reclamacoes = Reclamacao::whereHas('Usuario.PerfilUsuario', function($query){
                $query->where('tipo','=','Comerciante');
            })->get();

            return view('Reclamacao.IndexVendedor')->with('reclamacoes',$reclamacoes);
        }

        if (Gate::allows('AcessoAdministrador')) {
            $reclamacoes = Reclamacao::whereHas('Usuario.PerfilUsuario', function($query){
                $query->where('tipo','=','Vendedor');
            })->get();

            return view('Reclamacao.IndexVendedor')->with('reclamacoes',$reclamacoes);
        }
    }

    public function create()
    {
        return view('Reclamacao.create');
    }

    public function store(Request $request)
    {
        $regras = array(
            'descricao' => 'required|string'
        );

        $mensagens = array(
            'descricao.required' => 'O campo Descrição deve ser preenchido.',
        );

        $validator = Validator::make($request->all(), $regras, $mensagens);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $usuarioLogado = Auth::User();

        $reclamacao = Reclamacao::create([
            'idUsuario' => $usuarioLogado->id,
            'descricao' => $request['descricao'],
            'isVisualizada' => false
        ]);

        Session::flash('flash_message', 'Reclamação adicionada com sucesso!');

        return redirect()->back();
    }

    public function show($id)
    {
        $reclamacao = Reclamacao::find($id)->load('Usuario');
        return view('Reclamacao.Detail')->with('reclamacao',$reclamacao);
    }

    public function visualizar($id)
    {
        $reclamacao = Reclamacao::find($id);
        $reclamacao->isVisualizada = true;
        $reclamacao->save();

        Session::flash('flash_message', 'Reclamação visualizada.');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $reclamacao = Reclamacao::find($id);
        if(!empty($reclamacao))
        {
            $reclamacao->delete();
            Session::flash('flash_message', 'Reclamação removida com sucesso!');
            return redirect()->back();
        }

        Session::flash('flash_message', 'Reclamação não encontrada.');
    }
}
