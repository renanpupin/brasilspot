<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\TipoMeta;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use DB;

class TipoMetaController extends Controller
{
    public function index()
    {
        $tiposMeta = TipoMeta::orderBy('descricao','asc')->paginate(10);

        return view('TipoMeta.Index')->with('tiposMeta',$tiposMeta);
    }


    public function create()
    {
        return view('TipoMeta.Create');
    }


    public function store(Request $request)
    {
        $regras = array(
            'descricao' => 'required|string'
        );

        $mensagens = array(
            'required' => 'O campo :attribute deve ser preenchido.',
            'string' => 'O campo :attribute deve ser texto.'
        );

        $this->validate($request, $regras, $mensagens);

        TipoMeta::Create([
            'descricao' => $request['descricao']
        ]);

        Session::flash('flash_message', 'Tipo de Meta adicionado com sucesso!');

        return redirect()->back();
    }

    public function show($id)
    {
        $tipoMeta = TipoMeta::find($id);
        return view('TipoMeta.Detail')->with('tipoMeta',$tipoMeta);
    }


    public function edit($id)
    {
        $tipoMeta = TipoMeta::findOrNew($id);
        return view('TipoMeta.Edit')->with('tipoMeta',$tipoMeta);
    }


    public function update(Request $request, $id)
    {
        $tipoMeta = TipoMeta::find($id);

        $regras = array(
            'descricao' => 'required|string'
        );

        $mensagens = array(
            'required' => 'O campo :attribute deve ser preenchido.',
            'string' => 'O campo :attribute deve ser texto.'
        );

        $this->validate($request, $regras, $mensagens);

        $tipoMeta->descricao = $request['descricao'];

        $tipoMeta->save();

        Session::flash('flash_message', 'Tipo de Meta alterado com sucesso!');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $tipoMeta = TipoMeta::find($id);

        if(!empty($tipoMeta))
        {
            $tipoMeta->delete();
            Session::flash('flash_message', 'Tipo de Meta removido com sucesso!');
            return redirect()->back();
        }

        //TODO: retornar erro e não mensagem
        return 'Tipo de Meta não foi encontrado';
    }
}
