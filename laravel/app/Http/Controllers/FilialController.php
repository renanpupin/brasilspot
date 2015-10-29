<?php

namespace App\Http\Controllers;

use App\Filial;
use App\WhatsApp;
use Illuminate\Contracts\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Empresa;
use App\User;
use App\Emdereco;
use App\Plano;
use App\Vendedor;
use Illuminate\Support\Facades\Session;
use Auth;
use Gate;
use App\Http\Controllers\Controller;

class FilialController extends Controller
{

    public function index()
    {

        if(Gate::allows('AcessoComerciante'))
        {
            $usuario = Auth::user();
            $empresa = $usuario->Empresa()->first();
            $filiais = Filial::where('idEmpresa','=',$empresa->id)->get();

            return view('Filial.Index')->with('filiais',$filiais);
        }
        $filiais = Filial::with('Endereco')->get();
        return view('Filial.Index')->with('filiais',$filiais);
    }


    public function create()
    {
        return view('Filial.Create');
    }

    public function store(Request $request)
    {
        $regras = array(
            'endereco' => 'required|string',
            'bairro' => 'required|string',
            'cidade' => 'required|string',
            'estado' => 'required|string',
            'cep' => 'string',
            'lon' => 'string',
            'lat' => 'string',
            'telefone' => 'required|string',
            'whatsApp' => 'string',
            'isPrincipal' => 'required|string'
        );

        $mensagens = array(
            'required' => 'O campo :attribute deve ser preenchido.',
            'string' => 'O campo :attribute deve ser texto.'
        );

        $this->validate($request,$regras,$mensagens);

        DB::transaction(function($request) {

            try {
                $endereco = Endereco::create([
                    'endereco' => $request['endereco'],
                    'bairro' => $request['bairro'],
                    'estado' => $request['estado'],
                    'cidade' => $request['cidade'],
                    'lon' => $request['lon'],
                    'lat' => $request['lat'],
                    'cep' => $request['cep']
                ]);

                $telefone = Telefone::create([
                    'numero' => $request['telefone']
                ]);

                $whatsAppNumero = $request['whatsapp'];
                if(!empty($whatsAppNumero))
                {
                    $whatsApp = WhatsApp::create([
                       'numero' => $whatsAppNumero
                    ]);
                }

                $usuario = Auth::user();
                $idEmpresa = $usuario->Empresa()->id;

                Filial::create([
                    'idEmpresa' => $idEmpresa,
                    'idEndereco' => $endereco->id,
                    'idTelefone' => $telefone->id,
                    'idWhatsApp' => $whatsApp->id,
                    'isPrincipal' => $request['isPrincipal']
                ]);
            }
            catch(ValidationException $exception)
            {
                return redirect()->back();
            }
        });

        Session::flash('flash_message', 'Filial adicionada com sucesso!');

        return redirect()->back();
    }


    public function show($id)
    {
        $empresa = Empresa::find($id);

        return view('Filial.Detail')->with('empresa',$empresa);
    }

    public function edit($id)
    {
        $empresa = Empresa::find($id);

        return view('Filial.Edit')->with('empresa',$empresa);
    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
}
