<?php

namespace App\Http\Controllers;

use App\Comerciante;
use App\Meta;
use App\Plano;
use App\TipoVendedor;
use App\Vendedor;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\PerfilUsuario;
use App\PlanoUsuario;
use App\Http\Controllers\Controller;
use Hash;
use DB;
use Validator;
use Auth;
use Gate;
use Illuminate\Mail\Message;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use PhpSpec\Exception\Exception;


class UsuarioController extends Controller
{

    public function index()
    {
        $usuarios = User::with('PerfilUsuario')->with('Comerciante')->with('Comerciante.Plano')->paginate(10);
        return view('Usuario.index')->with('usuarios',$usuarios);
    }


    public function create()
    {
        $perfis = ['-1'=>'Selecione o perfil'] + PerfilUsuario::orderBy('tipo','asc')->lists('tipo','id')->all();
        $planos = ['-1'=>'Selecione o plano'] + Plano::orderBy('nome','asc')->lists('nome','id')->all();
        $tiposVendedores = ['-1'=>'Selecione o tipo de vendedor'] + TipoVendedor::orderBy('tipo','asc')->lists('tipo','id')->all();
        $metas = ['-1'=>'Selecione a meta'] + Meta::orderBy('numeroEmpresas','asc')->lists('numeroEmpresas','id')->all();

        return View('Usuario.create')
            ->with('perfis',$perfis)
            ->with('planos',$planos)
            ->with('tiposVendedores',$tiposVendedores)
            ->with('metas',$metas);
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
                return redirect()->back()->withErrors($errors);
            }

            DB::commit();

            Session::flash('flash_message', 'Usuário adicionada com sucesso!');
            return redirect()->back();
        }


        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $usuario = User::with('PlanoUsuario')->with('PlanoUsuario.Plano')->find($id);
        $perfis = ['-1'=>'Selecione o perfil'] + PerfilUsuario::orderBy('tipo','asc')->lists('tipo','id')->all();
        $planos = ['-1'=>'Selecione o plano'] + Plano::orderBy('nome','asc')->lists('nome','id')->all();

        return view('Usuario.Edit')
            ->with('usuario',$usuario)
            ->with('perfis',$perfis)
            ->with('planos', $planos);
    }

    public function editarSeuPerfil()
    {
        $usuario = Auth::User();
        return view('Usuario.EditarPerfil')->with('usuario',$usuario);
    }

    public function atualizarSeuPerfil(Request $request)
    {
        $name = $request['name'];
        $email = $request['email'];
        $password = $request['password'];
        $passwordConfirmado = $request['passwordConfirm'];
        $usuarioId = $request['usuarioId'];

        $regras = array(
            'email' => 'required|string',
            'name' => 'required'
        );
        $mensagens = array(
            'required' => 'O campo :attribute deve ser preenchido.',
            'name.required' =>'O campo nome deve ser preenchido.'
        );

        $validator = Validator::make($request->all(), $regras, $mensagens);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if(empty($password) && empty($passwordConfirmado))
        {
            $usuario = User::find($usuarioId);
            $usuario->name = $name;
            $usuario->email = $email;
            $usuario->save();

            Session::flash('flash_message', 'Perfil atualizado com sucesso!');
            return redirect()->back();
        }
        else
        {
            if($password == $passwordConfirmado)
            {
                $usuario = User::find($usuarioId);
                $usuario->name = $name;
                $usuario->email = $email;
                $usuario->password = bcrypt($password);
                $usuario->save();

                Session::flash('flash_message', 'Perfil atualizado com sucesso!');
                return redirect()->back();
            }
            else
            {
                $errors = $validator->getMessageBag();
                $errors->add('ErroException', 'As Senhas são diferentes.');
                return redirect()->back()->withErrors($errors);
            }
        }
    }



    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
