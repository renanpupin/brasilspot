<?php

namespace App\Http\Controllers;

use App\Assinatura;
use App\AssinaturaComerciante;
use App\Comerciante;
use Illuminate\Http\Request;
use Validator;
use Hash;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ComercianteController extends Controller
{

    public function index()
    {
        $comerciantes = Comerciante::all();

        return View('Comerciante.Index')->with('comerciantes', $comerciantes);
    }

    public function create()
    {
        return View('Comerciante.Create');
    }

    public function store(Request $request)
    {

        $regras = array(
            'nome' => 'required|string',
            'email' => 'required'
        );

        $mensagens = array(
            'required' => 'O campo :attribute deve ser preenchido.'
        );

        $validator = Validator::make($request->all(), $regras, $mensagens);

        if ($validator->fails()) {
            return redirect('comerciantes/cadastrar')
                ->withErrors($validator)
                ->withInput();
        }

        $qtdComerciante = User::where('email', $request['email'])->count();

        if($qtdComerciante == 0) {

            $senha = rand(100000, 999999);
            $usuario = User::create([
                'name' => $request['nome'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'idPerfilUsuario' => 3
            ]);

            Comerciante::create([
                'idVendedor' => 1,
                'idUsuario' => $usuario->id
            ]);

        Mail::send('Usuario.EmailTemplate', ['email' => $usuario->email, 'password' => $senha], function ($message) use ($usuario) {
            $message->to($usuario->email, $usuario->name)->subject('BrasilSpot Login');
        });

            Session::flash('flash_message', 'Comerciante adicionado com sucesso!');
            return redirect()->back();

        }else{
            $validator->errors()->add('email', 'Já existe um usuário cadastrado para o e-mail informado!');
            return redirect('comerciantes/cadastrar')
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function resumo()
    {
        $usuario = Auth::user();

        $qtd_visualizacoes = 123;
        $qtd_mensagens = 5;
        $qtd_assinaturas = 3;
        return View('Comerciante.resumo')->with('qtd_assinaturas', $qtd_assinaturas)->with('qtd_mensagens', $qtd_mensagens)->with('qtd_visualizacoes', $qtd_visualizacoes);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function minhasAssinaturas()
    {
        $usuario = Auth::user();
        $comerciante = Comerciante::where('idUsuario','=',$usuario->id)->first();
        $query =  DB::select(DB::raw("select count(idComerciante) as qtdAssinaturasTotais from assinaturasComerciantes ac inner join assinaturas a on a.id = ac.idAssinatura  where idComerciante = :comercianteId  group by idComerciante"),['comercianteId' => $comerciante->id]);

        if(sizeof($query) > 0) {
            $qtdAssinaturasTotais = $query[0]->qtdAssinaturasTotais;
        }else{
            $qtdAssinaturasTotais = 0;
        }

        $assinaturasComerciantes = AssinaturaComerciante::where('idComerciante','=',$comerciante->id)->with('Assinatura')->with('Assinatura.Plano')->get();

        return view('Comerciante.Assinatura')->with('qtdAssinaturas',$qtdAssinaturasTotais)->with('assinaturasComerciante',$assinaturasComerciantes);

    }
}
