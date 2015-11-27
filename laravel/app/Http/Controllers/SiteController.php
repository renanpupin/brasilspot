<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Input;
use Redirect;
use Gate;
use DB;
use Auth;
use Response;
use App\Empresa;
use App\Categoria;
use App\Servico;
use App\Endereco;
use App\Tag;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{

    public function visualizar()
    {
        $empresas = Empresa::all();

        return view('VisualizarEmpresa')->with('empresas', $empresas);
    }

    public function BuscaEmpresa($nomeFantasia)
    {
        return Empresa::where('nomeFantasia', 'like', '%' + $nomeFantasia + '%')->get();
    }

    public function filtroEmpresas($filtros = null)
    {
        $local = Input::get("local");  //apenas um
        $servicos = Input::get("com");  //um ou varios
        $tipo = Input::get("tipo");     //comercios,servicos,atracoes,profissionais

        $categoria = null;
        $subcategoria = null;

        if($filtros)
        {
            $filtros = explode('/', $filtros);
            if(sizeof($filtros) > 0){
                $categoria = $filtros[0];
            }
            if(sizeof($filtros) == 2){
                $subcategoria = $filtros[1];
            }
        }

//        dd("LOCAL = ".$local,"SERVICOS = ".$servicos,"CATEGORIA = ".$categoria, "SUBCATEGORIA = ".$subcategoria,"TIPO DA EMPRESA = ".$tipo);

        //$servicos_array = explode(",", $servicos);

        $categorias = Categoria::orderBy('nome', 'asc')->lists('nome', 'id')->all();

        //if (static::whereSlug($slug)->exists())
//        $categoria = Categoria::where('slug', '=', "comercio")->first();
        //$empresas = Empresa::with($categoria)->get();
//        $categoria = Categoria::where_slug("comercio")->first();
//        dd($categoria);



        //Todo: arrumar a busca aqui para pegar somente as subcategorias de uma categoria selecionada (a categoria vai vir no formato slug)
        $subcategorias = Categoria::orderBy('nome', 'asc')->lists('nome', 'id')->all();

        $servicos = Servico::orderBy('descricao', 'asc')->lists('descricao', 'id')->all();


        //Todo: busca de empresas pelos parâmetros informados na url
        //EX: http://localhost:8000/Empresas/restaurantes/pizzarias?com=wi-fi,seguranca&local=sp&tipo=comercios

        return view('index')->with('tipo',$tipo)->with('categorias',$categorias)->with('subcategorias',$subcategorias)->with('servicos',$servicos);
    }

    public function listarPorCategoria($slug)
    {

        //TODO:buscar id da categoria pelo slug (ver funçao slug do eloquent) e retornar as empresas paginadas por esta categoria
        //Se a categoria possuir filhas, então traz as empresas da categoria filha também
        return view('Categoria')->with('slug', $slug);
    }




    public function pesquisarEmpresa()
    {
        //http://laravel.io/forum/02-25-2014-how-to-perform-a-tag-search

        $query = Input::get("query");

        $registers = Empresa::where('nomeFantasia', 'like', '%' . $query . '%')->get();

        if($registers->isEmpty()){
            $registers = Tag::where('nome','like','%'.$query.'%')->get();
        }

        if($registers->isEmpty()){
            $registers = Categoria::where('nome','like','%'.$query.'%')->get();
        }

        return Response::json($registers);
    }

    public function pesquisarEndereco()
    {
        $query = Input::get("query");

        $registers = Endereco::where('endereco', 'like', '%' . $query . '%')->orWhere('cidade', 'like', '%' . $query . '%')->orWhere('estado', 'like', '%' . $query . '%')->get();
        //Todo: retornar apenas a cidade e estado

        return Response::json($registers);
    }

}

