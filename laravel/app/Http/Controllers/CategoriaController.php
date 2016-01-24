<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Categoria;
use App\TipoEmpresa;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Auth;
use Validator;
class CategoriaController extends Controller
{
    public function index()
    {
        // Auth::loginUsingId(1);

        //$this->authorize('listar-categorias');

        $categorias = Categoria::orderBy('nome','asc')->with('CategoriaPai')->paginate(10);

        return view('Categoria.Index')->with('categorias',$categorias);
    }

    public function listarCategorias()
    {
        $categorias = Categoria::orderBy('nome','asc')->lists('nome', 'id');

        return view('Categorias')->with('categorias',$categorias);
    }


    public function create()
    {
        $categorias = ['-1'=>'Selecione a categoria principal'] + Categoria::lists('nome', 'id')->all();
        $tiposCategoria = ['-1'=>'Selecione o tipo da categoria'] + TipoEmpresa::lists('tipo', 'id')->all();
        return view('Categoria.Create')->with('categorias', $categorias)->with('tiposCategoria', $tiposCategoria);
    }


    public function store(Request $request)
    {
        $regras = array(
            'nome' => 'required|string',
            'idTipoCategoria' => 'required|string'
        );

        $mensagens = array(
            'required' => 'O campo :attribute deve ser preenchido.'
        );

        $validator = Validator::make($request->all(), $regras, $mensagens);

        if ($validator->fails()) {
            return redirect('Categoria/cadastrar')
                ->withErrors($validator)
                ->withInput();
        }

        if($request['idTipoCategoria'] != -1){
            if($request['idCategoriaPai'] == -1)
            {
                Categoria::Create([
                    'nome' => $request['nome'],
                    'idTipoCategoria' => $request['idTipoCategoria'],
                    'idCategoriaPai' => null,
                    'slug' => str_slug($request['nome'])
                ]);
            }
            else {
                Categoria::Create([
                    'nome' => $request['nome'],
                    'idTipoCategoria' => $request['idTipoCategoria'],
                    'idCategoriaPai' => $request['idCategoriaPai'],
                    'slug' => str_slug($request['nome'])
                ]);
            }

            Session::flash('flash_message', 'Categoria adicionada com sucesso!');

            return redirect()->back();
        }else{
            $validator->errors()->add('idTipoCategoria', 'O campo Tipo da Categoria deve ser selecionado.');
            return redirect('Categoria/cadastrar')
                ->withErrors($validator)
                ->withInput();
        }
    }


    public function show($id)
    {
        $categoria = Categoria::find($id);

        if($categoria->idCategoriaPai != null) {
            $categoria->nomeCategoriaPai = $categoria->CategoriaPai->nome;
        }

        $categoria->idCategoriaPai = $categoria->TipoCategoria->tipo;

        return view('Categoria.Detail')->with('categoria',$categoria);
    }


    public function edit($id)
    {
        $categoriasQuery = Categoria::where('id','<>',$id)->get();

        $categoriasDropDown = ['-1'=>'Selecione a categoria principal'] + $categoriasQuery->lists('nome','id')->all();

        $categoria = Categoria::findOrNew($id);

        $tiposCategoria = ['-1'=>'Selecione o tipo da categoria'] + TipoEmpresa::lists('tipo', 'id')->all();

        return view('Categoria.Edit')->with('categorias', $categoriasDropDown)->with('categoria',$categoria)->with('tiposCategoria',$tiposCategoria);
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

        $validator = Validator::make($request->all(), $regras, $mensagens);

        if ($validator->fails()) {
            return redirect('Categoria/editar/'.$id)
                ->withErrors($validator)
                ->withInput();
        }

        if($request['idTipoCategoria'] != -1){

            if($request['idCategoriaPai'] == -1)
            {
                $categoria->nome = $request['nome'];
                $categoria->idTipoCategoria = $request['idTipoCategoria'];
                $categoria->idCategoriaPai = null;
            }
            else {

                $categoria->nome = $request['nome'];
                $categoria->idTipoCategoria = $request['idTipoCategoria'];
                $categoria->idCategoriaPai = $request['idCategoriaPai'];
            }

            $categoria->save();

            Session::flash('flash_message', 'Categoria alterada com sucesso!');

            return redirect('Categoria/editar/'.$id);

        }else{
            $validator->errors()->add('idTipoCategoria', 'O campo Tipo da Categoria deve ser selecionado.');
            return redirect('Categoria/editar/'.$id)
                ->withErrors($validator)
                ->withInput();
        }
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

        Session::flash('flash_message', 'A categoria não foi encontrada.');

        return redirect()->back();
    }
}
