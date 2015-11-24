<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Meta;

class MetaController extends Controller
{

    public function index()
    {
        $metas = Meta::orderBy('numeroEmpresas', 'asc')->paginate(10);
//        $metas = Meta::orderBy('nome','asc')->lists('nome', 'id');

        return view('Meta.Index')->with('metas', $metas);
    }


    public function create()
    {
        return view('Meta.Create');
    }


    public function store(Request $request)
    {
        \App\Meta::create([
            'NumeroEmpresas' => $request['numeroEmpresas']
        ]);

        return "Meta Registrada com sucesso!!";
    }


    public function show($id)
    {
        $meta = Meta::find($id);
        return view('Meta.Detail')->with('meta',$meta);
    }


    public function edit($id)
    {
        $meta = Meta::findOrNew($id);
        return view('Meta.Edit')->with('meta',$meta);
    }


    public function update(Request $request, $id)
    {
        $meta = Meta::find($id);

        $regras = array(
            'numeroEmpresas' => 'required|string'
        );

        $mensagens = array(
            'required' => 'O campo :attribute deve ser preenchido.',
            'string' => 'O campo :attribute deve ser texto.'
        );

        $this->validate($request, $regras, $mensagens);

        $meta->numeroEmpresas = $request['numeroEmpresas'];

        $meta->save();

        Session::flash('flash_message', 'Meta alterada com sucesso!');

        return redirect()->back();
    }


    public function destroy($id)
    {
        //
    }

    public function mensal()
    {
        return view('Meta.Mensal');
    }


    public function historico()
    {
        return view('Meta.Historico');
    }
}
