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
use App\CategoriaEmpresa;
use App\ServicoEmpresa;
use App\TagEmpresa;
use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Routing;

class SiteController extends Controller
{

    public function buscarEmpresas()
    {
        $query_empresa = Input::get("pesquisaEmpresa");
        $query_endereco = Input::get("pesquisaEndereco");

        //$query_empresa = $request['pesquisaEmpresa'];
        //$query_endereco = $request['pesquisaEndereco'];

//        dd($query_empresa,$query_endereco);
        //TODO: query de busca de empresa aqui
        return redirect('Empresas');

        //arrumar esquema do filtro
//        return Redirect::action('SiteController@filtroEmpresas', [$query_empresa]);
    }

    public function BuscaEmpresa($nomeFantasia)
    {
        return Empresa::where('nomeFantasia', 'like', '%' + $nomeFantasia + '%')->get();
    }

    public function filtroEmpresas($filtros = null)
    {
//        dd($filtros);

        $local_url = Input::get("local");  //apenas um
        $servicos_url = Input::get("com");  //um ou varios
        $tipo_url = Input::get("tipo");     //comercios,servicos,atracoes,profissionais

//        $query_empresa = Input::get("pesquisaEmpresa");
//        $query_endereco = Input::get("pesquisaEndereco");


        $busca_url = Input::get("pesquisaEmpresa");     //busca de empresas
        $endereco_url = Input::get("pesquisaEndereco");     //busca de endereço

        $categoria_url = null;
        $subcategoria_url = null;

        if($filtros)
        {
            $filtros = explode('/', $filtros);
            if(sizeof($filtros) > 0){
                $categoria_url = $filtros[0];
            }
            if(sizeof($filtros) == 2){
                $subcategoria_url = $filtros[1];
            }
        }

//        dd("LOCAL = ".$local,"SERVICOS = ".$servicos,"CATEGORIA = ".$categoria, "SUBCATEGORIA = ".$subcategoria,"TIPO DA EMPRESA = ".$tipo);

        $categorias = Categoria::whereNull('idCategoriaPai')->orderBy('nome', 'asc')->lists('nome', 'id')->all();

        $subcategorias = Categoria::where('idCategoriaPai', '!=', '')->orderBy('nome', 'asc')->lists('nome', 'id')->all();


        $servicos_selecionados_id = array();
        if($servicos_url != null){
            $servicos_slug = explode(",", $servicos_url);
            foreach($servicos_slug as $servico_slug){
                $servicos_selecionados_id[] = Servico::where('slug', $servico_slug)->first()->id;
            }
        }

        $servicos = Servico::orderBy('descricao', 'asc')->lists('descricao', 'id')->all();


        //Todo: busca de empresas pelos parâmetros informados na url
        //EX: http://localhost:8000/Empresas/restaurantes/pizzarias?com=wi-fi,seguranca&local=sp&tipo=comercios

//        $empresas = Empresa::where();
        //$query = DB::table('empresas');

        if ($subcategoria_url != null)
        {
            $subcategoria_id = Categoria::where('slug', $subcategoria_url)->first()->id;

        }else if ($categoria_url != null)
        {
            $categoria_id = Categoria::where('slug', $categoria_url)->first()->id;
        }

//        $empresas_por_categoria = CategoriaEmpresa::where('idCategoria', $categoria_id)->get();
//        dd($empresas_por_categoria);

        /*if ($state_id != '--')
        {
            $query->where('state_id', '=', $state_id);
        }*/

//        $empresas = $query->orderBy('nomeFantasia')->get();

        $empresas = Empresa::with('CategoriaEmpresa')->with('CategoriaEmpresa.Categoria')->with('TipoCartao')->get();
//        dd($empresas);






        return view('index')
            ->with('busca_url', $busca_url)
            ->with('endereco_url', $endereco_url)
            ->with('empresas',$empresas)
            ->with('tipo',$tipo_url)
            ->with('categorias',$categorias)
            ->with('subcategorias',$subcategorias)
            ->with('servicos',$servicos)
            ->with('servicos_selecionados_id',$servicos_selecionados_id);
    }

    public function visualizar($id)
    {
        $empresa = Empresa::where('id', $id)->with('TipoEmpresa')->with('ServicoEmpresa')->with('ServicoEmpresa.Servico')->with('TagEmpresa')->with('TagEmpresa.Tag')->with('FotoEmpresa')->with('FotoEmpresa.Foto')->first();

        return view('VisualizarEmpresa')->with('empresa', $empresa);
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

