<?php

namespace App\Http\Controllers;

use App\MaterialPropaganda;
use Illuminate\Http\Request;
use App\Http\Requests;
//use App\Erro;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class MaterialPropagandaController extends Controller
{
    public function index()
    {
        $materiaisPropaganda = MaterialPropaganda::with('Usuario')->get();
        return view('MaterialPropaganda.Index')->with('materiaisPropagandas', $materiaisPropaganda);
    }


    public function create()
    {
        return view('MaterialPropaganda.Create');
    }


    public function store(Request $request)
    {

    }

    public function show($id)
    {
//        $erro = Erro::find($id);
        return view('MaterialPropaganda.Detail');
    }

    public function destroy($id)
    {
//        $erro = Erro::find($id);
//
//        if(!empty($erro))
//        {
//            $erro->delete();
//            Session::flash('flash_message', 'Erro removido com sucesso!');
//            return redirect()->back();
//        }
//
//        return 'O erro não foi encontrado';
    }
}
