<?php

namespace App\Http\Controllers;

use App\Filial;
use App\WhatsApp;
use Illuminate\Contracts\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Empresa;
use App\User;
use App\Endereco;
use App\Plano;
use App\Telefone;
use Illuminate\Support\Facades\Session;
use Auth;
use DB;
use Gate;
use App\AsssinaturaComerciante;
use App\Http\Controllers\Controller;

class FilialController extends Controller
{

    public function index()
    {
        $usuario = Auth::user();
        $numero_assinaturas = AsssinaturaComerciante::where('idComerciante','!=', '')->where('idUsuario', '=', $usuario)->count();
        if (Gate::allows('AcessoComerciante'))
        {
            $empresa = Empresa::where('idUsuario','=',$usuario->id)->first();
            if($empresa != null)
            {
                $filiais = Filial::where('idEmpresa','=',$empresa->id)->get();
            }
           return view('Filial.index')->with('filiais',$filiais);
         }
            else
            if(Gate::allows('AcessoVendedor') || Gate::allows('AcessoComerciante') )
            {
                $filiais = Filial::with('Endereco')->get();
                return view('Filial.index')->with('filiais',$filiais);
            }

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

        DB::beginTransaction();
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

            $usuario = Auth::user()->with('Empresa');
            $idEmpresa = $usuario->Empresa->id;

            if(empty($idEmpresa))
            {
                DB::rollBack();
                return redirect()->back();
            }

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
            DB::rollBack();
            return redirect()->back();
        }
        DB::commit();

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
