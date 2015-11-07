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
use App\Http\Controllers\Controller;

class ReclamacaoController extends Controller
{

    public function index()
    {
        $reclamacoes = Reclamacao::all()->load('Usuario');
        return view('Reclamacao.Index')->with('reclamacoes',$reclamacoes);
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

        return 'A reclamação não foi encontrada';
    }
}
