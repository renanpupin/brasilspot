<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Servico;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

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
            'descricao' => $request['descricao']
        ]);

        Session::flash('flash_message', 'Serviço adicionado com sucesso!');

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

        return 'Serviço não foi encontrado';
    }
}
