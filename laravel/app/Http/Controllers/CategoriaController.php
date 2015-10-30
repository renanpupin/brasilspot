<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Categoria;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Auth;

class CategoriaController extends Controller
{
    public function index()
    {
       // Auth::loginUsingId(1);

        //$this->authorize('listar-categorias');

        $categorias = Categoria::all();

        foreach($categorias as $categoria)
        {
            if($categoria->idCategoriaPai != null) {
                $categoria->nomeCategoriaPai = $categoria->CategoriaPai->nome;

            }

           // $categoria->nomeCategoriaPai = $categoriaPai->nome;
        }
        return view('Categoria.Index')->with('categorias',$categorias);
    }


    public function create()
    {
        $categorias = ['-1'=>'Selecione a categoria principal'] + Categoria::lists('nome', 'id')->all();
        return view('Categoria.Create')->with('categorias', $categorias);
    }


    public function store(Request $request)
    {
        $regras = array(
            'nome' => 'required|string'
        );

        $mensagens = array(
            'required' => 'O campo :attribute deve ser preenchido.'
        );

        $this->validate($request, $regras, $mensagens);

        if($request['idCategoriaPai'] == -1)
        {
            Categoria::Create([
                'nome' => $request['nome'],
                'idCategoriaPai' => null
            ]);
        }
        else {

            Categoria::Create([
                'nome' => $request['nome'],
                'idCategoriaPai' => $request['idCategoriaPai']
            ]);
        }

        Session::flash('flash_message', 'Categoria adicionada com sucesso!');

        return redirect()->back();
    }


    public function show($id)
    {
        $categoria = Categoria::find($id);

        if($categoria->idCategoriaPai != null) {
            $categoria->nomeCategoriaPai = $categoria->CategoriaPai->nome;
        }
        
        return view('Categoria.Detail')->with('categoria',$categoria);
    }


    public function edit($id)
    {
        $categoriasQuery = Categoria::where('id','<>',$id)->get();

        $categoriasDropDown = ['-1'=>'Selecione a categoria principal'] + $categoriasQuery->lists('nome','id')->all();

        $categoria = Categoria::findOrNew($id);

        return view('Categoria.Edit')->with('categorias', $categoriasDropDown)->with('categoria',$categoria);
    }


    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);

        $regras = array(
            'nome' => 'required|string'
        );

        $mensagens = array(
            'required' => 'O campo :attribute deve ser preenchido.'
        );

        $this->validate($request, $regras, $mensagens);

        if($request['idCategoriaPai'] == -1)
        {
            $categoria->nome = $request['nome'];
            $categoria->idCategoriaPai = null;
        }
        else {

            $categoria->nome = $request['nome'];
            $categoria->idCategoriaPai = $request['idCategoriaPai'];
        }

        $categoria->save();

        Session::flash('flash_message', 'Categoria alterada com sucesso!');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        if(!empty($categoria))
        {
            $possuiCategoriaVinculada = Categoria::where('idCategoriaPai','=',$categoria->id)->count() > 0;
            if($possuiCategoriaVinculada)
            {
                $mensagem = 'A Categoria seleciona possui outras categorias vinculadas, remova todas estas categorias primeiro.';
                return redirect()->back()->with('erros', $mensagem);
            }else{
                $categoria->delete();
                Session::flash('flash_message', 'Categoria removida com sucesso!');
                return redirect()->back();
            }
        }

        return 'Categoria não foi encontrado';
    }
}
