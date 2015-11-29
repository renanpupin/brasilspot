<?php

namespace App\Http\Controllers;

use App\ServicoEmpresa;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Servico;
use App\Empresa;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use DB;

class ServicoController extends Controller
{
    public function index()
    {
        $servicos = Servico::orderBy('descricao','asc')->paginate(10);

        return view('Servico.Index')->with('servicos',$servicos);
    }


    public function create()
    {
        return view('Servico.Create');
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

        Servico::Create([
            'descricao' => $request['descricao'],
            'slug' => str_slug($request['descricao'])
        ]);

        Session::flash('flash_message', 'Serviço adicionado com sucesso!');

        return redirect()->back();
    }

    public function selecionar()
    {
        //Todo:buscar todos os servicos já selecionados na empresa para listar nos combos

        $servicos = Servico::orderBy('descricao','asc')->get();

        $usuario = Auth::User();

        $empresa = Empresa::where('idUsuario','=',$usuario->id)->first();

        if($empresa != null)
        {
            $servicos_selecionados = ServicoEmpresa::where('idEmpresa','=',$empresa->id)->get();


            $todos_selecionados = array();

            foreach($servicos_selecionados as $selecionado){
                $todos_selecionados[] =  $selecionado->idServico;
            }

        }else{
            Session::flash('flash_message', 'Primeiro efetue o cadastro de sua empresa!');
            return redirect('SuaEmpresa');
        }



        return view('Servico.ServicosOferecidos')->with('servicos',$servicos)->with('servicos_selecionados',$todos_selecionados);
    }

    public function gravarSelecionados(Request $request)
    {

        $usuario = Auth::User();

        $empresa = Empresa::where('idUsuario','=',$usuario->id)->first();

        $servicos = $request['servicos'];

        DB::beginTransaction();

        try {

            ServicoEmpresa::where('idEmpresa', $empresa->id)->delete();

            foreach ($servicos as $servico) {
                ServicoEmpresa::Create([
                    'idEmpresa' => $empresa->id,
                    'idServico' => $servico
                ]);
            }

            Session::flash('flash_message', 'Serviços atualizados com sucesso!');

        }catch (Exception $exception) {
            DB::rollBack();
            Session::flash('flash_message', 'Ocorreu um erro ao atualizar os serviços!');
        }

        return redirect()->back();
    }

    public function show($id)
    {
        $servico = Servico::find($id);
        return view('Servico.Detail')->with('servico',$servico);
    }


    public function edit($id)
    {
        $servico = Servico::findOrNew($id);
        return view('Servico.Edit')->with('servico',$servico);
    }


    public function update(Request $request, $id)
    {
        $servico = Servico::find($id);

        $regras = array(
            'descricao' => 'required|string'
        );

        $mensagens = array(
            'required' => 'O campo :attribute deve ser preenchido.',
            'string' => 'O campo :attribute deve ser texto.'
        );

        $this->validate($request, $regras, $mensagens);

        $servico->descricao = $request['descricao'];

        $servico->save();

        Session::flash('flash_message', 'Serviço alterado com sucesso!');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $servico = Servico::find($id);

        if(!empty($servico))
        {
            $servico->delete();
            Session::flash('flash_message', 'Serviço removido com sucesso!');
            return redirect()->back();
        }

        //TODO: retornar erro e não mensagem
        return 'Serviço não foi encontrado';
    }
}
