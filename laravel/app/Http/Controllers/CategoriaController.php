<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Categoria;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();

        return view('Categoria.Index')->with('categorias',$categorias);
    }


    public function create()
    {
        $categorias = ['-1'=>'Selecione a categoria pai'] + Categoria::lists('nome', 'id')->all();
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

        Categoria::Create([
            'nome' => $request['nome'],
            'idCategoriaPai' => $request['idCategoriaPai']
        ]);

        Session::flash('flash_message', 'Categoria adicionada com sucesso!');

        return redirect()->back();
    }


    public function show($id)
    {
        $categoria = Categoria::find($id);
        return view('Categoria.Detail')->with('categoria',$categoria);
    }


    public function edit($id)
    {
        //dropdown list
        $categorias = ['-1'=>'Selecione a categoria pai'] + Categoria::lists('nome', 'id')->all();

        //não mostrar no dropdown a própria categoria

        //object model
        $categoria = Categoria::findOrNew($id);

        //selected option
        //$categoriaSelecionada = $categoria->idCategoriaPai;

        return view('Categoria.Edit')->with('categorias', $categorias)->with('categoria',$categoria);
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

        $categoria->nome = $request['nome'];
        $categoria->idCategoriaPai = $request['idCategoriaPai'];

        $categoria->save();

        Session::flash('flash_message', 'Categoria alterada com sucesso!');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);

        if(!empty($categoria))
        {
            $categoria->delete();
            Session::flash('flash_message', 'Categoria removida com sucesso!');
            return redirect()->back();
        }

        return 'Categoria não foi encontrado';
    }
}
