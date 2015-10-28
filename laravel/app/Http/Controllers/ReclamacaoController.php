<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Session;
use Input;
use Validator;
use Redirect;
use App\Http\Controllers\Controller;

class ReclamacaoController extends Controller
{

    public function index()
    {
        return view('Reclamacao.Index');
    }

    public function create()
    {
        return View('Reclamacao.create');
    }


    public function show($id)
    {
        //$reclamacao = Reclamacao::find($id);

        return view('Reclamacao.Detail');//->with('reclamacao',$reclamacao);
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
