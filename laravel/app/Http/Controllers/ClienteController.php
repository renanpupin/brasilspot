<?php

namespace App\Http\Controllers;

use App\Comerciante;
use App\PerfilUsuario;
use App\User;
use App\Vendedor;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Auth;

class ClienteController extends Controller
{
    public function index()
    {
        $usuarioLogado = Auth::User()->load('Vendedor');

        if(Gate::allows('AcessoVendedor')) {

            $comerciantes = Comerciante::where('idVendedor', '=',$usuarioLogado->Vendedor->id)
                ->with('Usuario')
                ->with('AssinaturaComerciante')
                ->with('AssinaturaComerciante.Assinatura')
                ->with('AssinaturaComerciante.Assinatura.Plano')
                ->get();

            $vendedores = Vendedor::where('idVendedorPai','=',$usuarioLogado->Vendedor->id)->with('Usuario')->get();

            return view('Cliente.Gerenciar')->with('comerciantes',$comerciantes);
        }
        return view('401');
    }

    public function create()
    {
        $perfis = PerfilUsuario::where('tipo','<>','Administrador')->lists('tipo','id');

        return View('Cliente.create')
            ->with('perfis',$perfis);
    }

    public function store(Request $request)
    {
        $regras = array(
            'email' => 'required|string',
            'name' => 'required',
            'perfis' => 'required|min:1',
        );
        $mensagens = array(
            'required' => 'O campo :attribute deve ser preenchido.',
            'perfis.min' => 'O campo perfil deve ser selecionado.'
        );

        $validator = Validator::make($request->all(), $regras, $mensagens);

        if ($validator->fails()) {
            return redirect('Usuario/cadastrar')
                ->withErrors($validator)
                ->withInput();
        }

        $perfil = PerfilUsuario::where('id','=',$request['perfis'])->first();

        $usuarioLogado = Auth::User()->load('Vendedor');

        if(Gate::allows('AcessoVendedor') && $perfil->tipo == 'Vendedor')
        {
            DB::beginTransaction();

            try
            {
                $senha = rand(100000, 999999);
                $usuario = User::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                    'idPerfilUsuario' => $request['perfis'],
                ]);

                Mail::send('Usuario.EmailTemplate', ['email' => $usuario->email, 'password' => $senha], function ($message) use ($usuario) {
                    $message->to($usuario->email, $usuario->name)->subject('BrasilSpot Login');
                });

                if( $perfil->tipo == 'Vendedor') {
                    $regras = array(
                        'tiposVendedores' => 'required|min:1',
                        'metas' => 'required|min:1',
                    );

                    $mensagens = array(
                        'tiposVendedores.required' => 'O campo Tipos De Vendedores deve ser selecionado.',
                        'tiposVendedores.min' => 'O campo Tipos De Vendedores deve ser selecionado.',
                        'metas.required' => 'O campo Metas deve ser selecionado.',
                        'metas.min' => 'O campo Metas deve ser selecionado.'
                    );

                    $validator = Validator::make($request->all(), $regras, $mensagens);

                    $vendedor = Vendedor::create([
                        'idUsuario' => $usuario->id,
                        'idTipo' => $request['tiposVendedores'],
                        'idMeta' => $request['metas'],
                        'idVendedorPai' => $usuarioLogado->id
                    ]);
                }

            }
            catch (Exception $exception)
            {
                DB::rollBack();
                $errors = $validator->getMessageBag();
                $errors->add('ErroException', 'Não foi possivel cadastrar o usuario.');
                return redirect()->back();
            }

            DB::commit();

            Session::flash('flash_message', 'Usuário adicionada com sucesso!');
            return redirect()->back();
        }
        else if(Gate::allows('AcessoVendedor') && $perfil->tipo == 'Comerciante')
        {
            DB::beginTransaction();

            try {

                $senha = rand(100000, 999999);
                $usuario = User::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => Hash::make($senha),
                    'idPerfilUsuario' => $request['perfis'],
                ]);

                Comerciante::create([
                    'idVendedor' => $usuarioLogado->Vendedor->id,
                    'idUsuario' => $usuario->id
                ]);

                Mail::send('Usuario.EmailTemplate', ['email' => $usuario->email, 'password' => $senha], function ($message) use ($usuario) {
                    $message->to($usuario->email,$usuario->name)->subject('BrasilSpot Login');
                });

            }catch (Exception $exception)
            {
                DB::rollBack();
                $errors = $validator->getMessageBag();
                $errors->add('ErroException', 'Não foi possivel cadastrar o usuario.');
                return redirect()->back();
            }

            DB::commit();

            Session::flash('flash_message', 'Usuário adicionada com sucesso!');
            return redirect()->back();
        }


        return redirect()->back();
    }

    public function show($id)
    {
        return view('Cliente.Detail');
    }


    public function edit($id)
    {
        $perfis = \App\PerfilUsuario::all()->lists('tipo','id');

        return View('Cliente.Edit')
            ->with('perfis',$perfis);
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function atualizarVencimento($id)
    {
        $usuario = User::where('id','=',$id)
            ->with('Comerciante')
            ->with('Comerciante.AssinaturaComerciante')
            ->with('Comerciante.AssinaturaComerciante.Assinatura')
            ->with('Comerciante.AssinaturaComerciante.Assinatura.Plano')
            ->first();

        return View('Cliente.AtualizarVencimento')->with('usuario',$usuario);
    }

    public function atualizarVencimentoStore(Request $request)
    {
        dd($request);
    }

}
