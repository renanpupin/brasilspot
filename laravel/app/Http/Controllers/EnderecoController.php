<?php

namespace App\Http\Controllers;

use App\ErroReportado;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Validator;
use Redirect;
use Auth;

class ErroController extends Controller
{
    public function index()
    {
        $erros = ErroReportado::all()->load('Usuario');
        return view('Erros.Index')->with('erros',$erros);
    }


    public function create()
    {
        return view('Erros.Create');
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
            return redirect('ReportarErro')
                ->withErrors($validator)
                ->withInput();
        }

        $usuarioLogado = Auth::User();

        $erro = ErroReportado::create([
            'idUsuario' => $usuarioLogado->id,
            'descricao' => $request['descricao'],
            'isCorrigido' => false
        ]);

        Session::flash('flash_message', 'Erro reportado com sucesso!');

        return redirect()->back();
    }

    public function show($id)
    {
        $erros = ErroReportado::find($id)->load('Usuario');
        return view('Erros.Detail')->with('erros',$erros);
    }

    public function destroy($id)
    {
        $erro = Erro::find($id);

        if(!empty($erro))
        {
            $erro->delete();
            Session::flash('flash_message', 'Erro removido com sucesso!');
            return redirect()->back();
        }

        return 'O erro não foi encontrado';
    }
}
