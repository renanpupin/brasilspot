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

use PagarMe;
use PagarMe_Transaction;
use PagarMe_Subscription;
use PagarMe_Plan;
use PagarMe_Card;
use App\Transacao;

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
                'password' => Hash::make($senha),
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

        //TODO: implementar queries aqui
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

        $qtdAssinaturasTotais = Assinatura::where('idComerciante', $comerciante->id)->count();

        $assinaturasComerciantes = Assinatura::where('idComerciante', $comerciante->id)->get();

        return view('Comerciante.Assinatura')->with('qtdAssinaturas',$qtdAssinaturasTotais)->with('assinaturasComerciante',$assinaturasComerciantes);

    }

    public function adicionarAssinaturas(){
        return View('Comerciante/AdicionarAssinaturas');
    }
    public function pagamentoAssinaturas(Request $request){
        $regras = array(
            'qtdAssinaturas' => 'required'
        );

        $mensagens = array(
            'required' => 'Selecione pelo menos uma assinatura para realizar o pagamento.'
        );

        if($request['qtdAssinaturas'] == 0){
            $request['qtdAssinaturas'] = null;
        }

        $validator = Validator::make($request->all(), $regras, $mensagens);

        if ($validator->fails()) {
            return redirect('assinaturas/adicionar')
                ->withErrors($validator)
                ->withInput();
        }

        //dd("Quantidade de assinaturas selecionadas = ".$request['qtdAssinaturas']."\nFalta testar a integração com o pagar.me");
        return View('Comerciante/PagarAssinaturas')->with('numeroAssinaturas', $request['qtdAssinaturas']);
    }

    public function efetivar(Request $request){

        Pagarme::setApiKey("ak_test_UvGkVG7SUAeiwCnzYarSKdxc3syszb");

        //$request = $request->all();

        $numero_assinaturas = $request['numeroAssinaturas'];

        $card_hash = $request['card_hash'];

        $valor = 2490*$numero_assinaturas;

        $usuario = Auth::user();

        //pagamento
//        $transactionPagarMe = new PagarMe_Transaction(array(
//            'amount' => $valor,
//            'card_hash' => $card_hash,
//            "metadata" => array(
//                "id" => $usuario->id,
//                "name" => $usuario->name,
//                "email" => $usuario->email
//            )
//        ));
//
//        $transactionPagarMe->charge();
//        $status = $transactionPagarMe->status; // status da transação
//        dd($status);


        //assinatura para o plano id=27440
        $subscription = new PagarMe_Subscription(array(
            'plan' => PagarMe_Plan::findById("27440"),
            'card_hash' => $card_hash,
            "metadata" => array(
                "id" => $usuario->id,
                "name" => $usuario->name,
                "email" => $usuario->email
            ),
            'customer' => array(
                'email' => $usuario->email
            )
        ));

        $subscription->create();

        if($subscription->status == "paid"){
            return View('Comerciante/StatusPagamento')->with('status',$subscription->status);
        }else{
            return View('Comerciante/StatusPagamento')->with('status','erro');
        }

    }
}
