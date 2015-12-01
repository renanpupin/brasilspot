<?php

namespace App\Http\Controllers;

use App\AssinaturaComerciante;
use App\AssinaturaFilial;
use App\Comerciante;
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
use Mockery\CountValidator\Exception;
use Validator;

class FilialController extends Controller
{

    public function index()
    {
        $usuario = Auth::user();


        if (Gate::allows('AcessoComerciante'))
        {
            $comerciante = Comerciante::where('idUsuario','=',$usuario->id)->first();
            $query =  DB::select(DB::raw("select count(idComerciante) as qtdAssinaturasTotais from assinaturasComerciantes ac inner join assinaturas a on a.id = ac.idAssinatura  where idComerciante = :comercianteId  group by idComerciante"),['comercianteId' => $comerciante->id]);
            $qtdAssinaturasTotais = $query[0]->qtdAssinaturasTotais;
            $query = DB::select(DB::raw("select count(idComerciante) as qtdAssinaturasUsadas from assinaturasComerciantes ac inner join assinaturas a on a.id = ac.idAssinatura inner join assinaturasFiliais af on af.idAssinatura = ac.idAssinatura where idComerciante = :comercianteId group by idComerciante"),['comercianteId' => $comerciante->id]);
            $qtdAssinaturasUsadas = empty($query) ? 0 : $query[0]->qtdAssinaturasUsadas;
            $qtdAssinaturasRestantes = $qtdAssinaturasTotais - $qtdAssinaturasUsadas;

            $empresa = Empresa::where('idUsuario','=',$usuario->id)->first();
            if($empresa != null)
            {
                $filiais = Filial::where('idEmpresa','=',$empresa->id)->get();
            }
           return view('Filial.index')->with('filiais',$filiais)->with('numero_assinaturas',$qtdAssinaturasRestantes);
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
            'estado' => 'required|not_in:-1',
            'endereco' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'telefone' => 'required',
            'isPrincipal' => 'required'
        );

        $mensagens = array(
            'estado.required' => 'O campo Estado deve ser selecionado.',
            'estado.not_in' => 'O campo Estado deve ser selecionado.',
            'endereco.required' => 'O campo Endereço deve ser preenchido.',
            'bairro.required' => 'O campo Bairro deve ser preenchido.',
            'cidade.required' => 'O campo Cidade deve ser preenchido.',
            'telefone.required' => 'O campo Telefone deve ser preenchido'
        );

        $validator = Validator::make($request->all(), $regras, $mensagens);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

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

            $usuario = Auth::user();
            $empresa = Empresa::where('idUsuario','=',$usuario->id)->first();
            $idEmpresa = $empresa->id;

            if(empty($idEmpresa))
            {
                DB::rollBack();
                return redirect()->back();
            }

            $filial = Filial::create([
                'idEmpresa' => $idEmpresa,
                'idEndereco' => $endereco->id,
                'idTelefone' => $telefone->id,
                'idWhatsApp' => $whatsApp->id,
                'isPrincipal' => $request['isPrincipal']
            ]);

            $idComerciante = Comerciante::where('idUsuario','=',$usuario->id)->first();
            $idsAssinaturasLiberadas = DB::select(DB::raw("select a.id from assinaturas a inner join assinaturasComerciantes ac on a.id = ac.idAssinatura where ac.idComerciante = :idComerciante and a.id not in(select idAssinatura from assinaturasFiliais)"),['idComerciante' => 1]);

            if(count($idsAssinaturasLiberadas) > 0) {
                AssinaturaFilial::create([
                    'idAssinatura' => $idsAssinaturasLiberadas[0]->id,
                    'idFilial' => $filial->id
                ]);
            }
            else
            {
                DB::rollBack();
                $errors = $validator->getMessageBag();
                $errors->add('ErroTags', 'Não existe assinatura disponivel.');
                return redirect()->back()->withErrors($errors);
            }
        }
        catch(ValidationException $exception)
        {
            DB::rollBack();
            $errors = $validator->getMessageBag();
            $errors->add('ErroTags', $exception);
            return redirect()->back()->withErrors($errors);
        }
        DB::commit();

        Session::flash('flash_message', 'Filial adicionada com sucesso!');

        return redirect()->back();
    }


    public function show($id)
    {
        $filial = Filial::with('Empresa')->with('Endereco')->with('Telefone')->with('WhatsApp')->find($id);
        return view('Filial.Detail')->with('filial',$filial);
    }

    public function edit($id)
    {
        $filial = Filial::with('Empresa')->with('Endereco')->with('Telefone')->with('WhatsApp')->find($id);
        return view('Filial.Edit')->with('filial',$filial);
    }


    public function update(Request $request)
    {
        $regras = array(
            'estado' => 'required|not_in:-1',
            'endereco' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'telefone' => 'required',
            'isPrincipal' => 'required'
        );

        $mensagens = array(
            'estado.required' => 'O campo Estado deve ser selecionado.',
            'estado.not_in' => 'O campo Estado deve ser selecionado.',
            'endereco.required' => 'O campo Endereço deve ser preenchido.',
            'bairro.required' => 'O campo Bairro deve ser preenchido.',
            'cidade.required' => 'O campo Cidade deve ser preenchido.',
            'telefone.required' => 'O campo Telefone deve ser preenchido.'
        );

        $validator = Validator::make($request->all(), $regras, $mensagens);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        DB::beginTransaction();
        try {
            $filial = Filial::find($request['idFilial']);

            $endereco = Endereco::find($filial->idEndereco);
            $telefone = Telefone::find($filial->idTelefone);
            $whatsApp = WhatsApp::find($filial->idWhatsApp);

            $filial->isPrincipal = $request['isPrincipal'];
            $filial->save();

            if ($endereco != null) {
                $endereco->endereco = $request['endereco'];
                $endereco->bairro = $request['bairro'];
                $endereco->cidade = $request['cidade'];
                $endereco->estado = $request['estado'];
                $endereco->cep = $request['cep'];
                $endereco->lon = $request['lon'];
                $endereco->lat = $request['lat'];
                $endereco->save();
            }

            if ($telefone != null) {
                $telefone->numero = $request['telefone'];
                $telefone->save();
            }

            if ($whatsApp != null) {
                $whatsApp->numero = $request['whatsapp'];
                $whatsApp->save();
            }
        }
        catch(Exception $exception)
        {
            DB::rollBack();
            $errors = $validator->getMessageBag();
            $errors->add('ErroTags', $exception);
            return redirect()->back()->withErrors($errors);
        }
        DB::commit();

        Session::flash('flash_message', 'Filial editada com sucesso!');

        return redirect()->back();

    }


    public function destroy($id)
    {
        DB::beginTransaction();
       try
       {
            AssinaturaFilial::where('idFilial','=',$id)->delete();
            Filial::where('id','=',$id)->delete();
       }
       catch(Exception $exception)
       {
           DB::rollBack();
           return redirect()->back();
       }
        DB::commit();

        Session::flash('flash_message', 'Filial removida com sucesso!');

        return redirect()->back();

    }
}
