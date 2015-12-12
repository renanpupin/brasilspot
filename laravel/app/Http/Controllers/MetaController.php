<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Meta;
use App\TipoMeta;
use Illuminate\Support\Facades\Session;

class MetaController extends Controller
{

    public function index()
    {
        $metas = Meta::orderBy('numeroAssinaturas', 'asc')->paginate(10);
//        $metas = Meta::orderBy('nome','asc')->lists('nome', 'id');

        return view('Meta.Index')->with('metas', $metas);
    }


    public function create()
    {
        $tiposMeta = ['-1'=>'Selecione o tipo da meta'] + TipoMeta::lists('descricao', 'id')->all();
        return view('Meta.Create')->with('tiposMeta', $tiposMeta);
    }


    public function store(Request $request)
    {
        $regras = array(
            'nome' => 'required|string',
            'numeroAssinaturas' => 'required',
            'recompensa' => 'required',
            'idTipoMeta' => 'required'
        );

        $mensagens = array(
            'required' => 'O campo :attribute deve ser preenchido.',
            'string' => 'O campo :attribute deve ser texto.'
        );

        $this->validate($request, $regras, $mensagens);

        Meta::create([
            'nome' => $request['nome'],
            'numeroAssinaturas' => $request['numeroAssinaturas'],
            'recompensa' => $request['recompensa'],
            'idTipoMeta' => $request['idTipoMeta'],
        ]);

        Session::flash('flash_message', 'Meta registrada com sucesso.');

        return redirect()->back();
    }


    public function show($id)
    {
        $meta = Meta::find($id);
        return view('Meta.Detail')->with('meta',$meta);
    }


    public function edit($id)
    {
        $meta = Meta::findOrNew($id);
        $tiposMeta = ['-1'=>'Selecione o tipo da meta'] + TipoMeta::lists('descricao', 'id')->all();
        return view('Meta.Edit')->with('meta',$meta)->with('tiposMeta', $tiposMeta);
    }


    public function update(Request $request, $id)
    {
        $meta = Meta::find($id);

        $regras = array(
            'nome' => 'required|string',
            'numeroAssinaturas' => 'required',
            'recompensa' => 'required',
            'idTipoMeta' => 'required'
        );

        $mensagens = array(
            'required' => 'O campo :attribute deve ser preenchido.',
            'string' => 'O campo :attribute deve ser texto.'
        );

        $this->validate($request, $regras, $mensagens);

        $meta->nome = $request['nome'];
        $meta->numeroAssinaturas = $request['numeroAssinaturas'];
        $meta->recompensa = $request['recompensa'];
        $meta->idTipoMeta = $request['idTipoMeta'];

        $meta->save();

        Session::flash('flash_message', 'Meta alterada com sucesso!');

        return redirect()->back();
    }


    public function destroy($id)
    {
        $meta = Meta::find($id);

        if(!empty($meta))
        {
            $meta->delete();
            Session::flash('flash_message', 'Meta removida com sucesso!');
            return redirect()->back();
        }

        Session::flash('flash_message', 'A meta não foi encontrada.');

        return redirect()->back();
    }

    public function mensal()
    {
        $metas = Meta::where('tipoEmpresa','Mensal')->orderBy('numeroEmpresas', 'asc');

        return view('Meta.Mensal')->with('metas', $metas);
    }

    public function ocasional()
    {
        $metas = Meta::where('tipoEmpresa','Ocasional')->orderBy('numeroEmpresas', 'asc');

        return view('Meta.Ocasional')->with('metas', $metas);
    }

    public function equipe()
    {
        $metas = Meta::where('tipoEmpresa','Equipe')->orderBy('numeroEmpresas', 'asc');

        return view('Meta.Equipe')->with('metas', $metas);
    }


    public function historico()
    {
        return view('Meta.Historico');
    }
}
