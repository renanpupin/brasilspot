<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
//use App\Erro;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class ErroController extends Controller
{
    public function index()
    {
        //$erros = Erro::all();

        return view('Erros.Index');
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
        $erro = Erro::find($id);
        return view('Erros.Detail')->with('erro',$erro);
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
