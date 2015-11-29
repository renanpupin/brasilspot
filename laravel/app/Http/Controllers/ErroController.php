<?php

namespace App\Http\Controllers;

use App\ErroReportado;
use Illuminate\Http\Request;
use App\Http\Requests;
//use App\Erro;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Gate;

class ErroController extends Controller
{
    public function index()
    {
        if(Gate::allows('AcessoAdministrador')) {
            $erros = ErroReportado::with('Usuario')->get();
            return view('Erros.Index')->with('erros', $erros);
        }
    }


    public function create()
    {
        return view('Erros.Create');
    }


    public function store(Request $request)
    {

    }

    public function show($id)
    {
        $erro = ErroReportado::with('Usuario')->find($id);

        return view('Erros.Detail')->with('erro',$erro);
    }

    public function aprovar($id)
    {
        $erro = ErroReportado::find($id);

        $erro->isCorrigido = 1;

        $erro->save();

        Session::flash('flash_message', 'Erro aprovado com sucesso!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $erro = ErroReportado::find($id);

        if(!empty($erro))
        {
            $erro->delete();
            Session::flash('flash_message', 'Erro removido com sucesso!');
            return redirect()->back();
        }

        return 'O erro não foi encontrado';
    }
}
