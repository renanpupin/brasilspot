<?php

namespace App\Http\Controllers;

use App\AssinaturaComerciante;
use App\AssinaturaFilial;
use PagarMe;
use PagarMe_Transaction;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;

use App\Transacao;


use DB;
use BaseController;


class PagamentoController extends Controller
{
    public function prepararPagamentoGet() { //Calcular
        $values = array(
            "0" => array(
                'valor' => "35,01",
                'descricao' => "Filiar de sorocaba",
            ),
            "1" => array(
                'valor' => "15,04",
                'descricao' => "Filiar de mandioquinha",
            )
        );
        return view('Pagamento/Calcular')->with("values", $values);
    }

    public function create(Request $request)
    { //Pagamento/InfoCartao
        $inputArray = $request->all();
        if (!isset($inputArray['totalTotalis'])) {
            return Redirect::to('Pagamento/Calcular')->with('message', 'Valor a ser pago inválido');
        }
        $valorReal = str_replace('R$ ','', $inputArray['totalTotalis']);
        $valorReal = str_replace(',','.',$valorReal);
        $valorReal = floatval($valorReal);
        if ($valorReal < 1 || $valorReal == 0 ) {
            return Redirect::to('Pagamento/Calcular')->with('message', 'Valor a ser pago inválido');
        }


        //dd(Input::all());
        //return $request->all() . $request.get("totalTotalis");
        return view('Pagamento/InfoCartao')
            ->with("valorPagamento", "R$ ".str_replace('.',',',$valorReal))
            ->with("dirtyValorPagamento", $valorReal);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { //Pagamento/Efetivar
//        <!-- 30260641400977, CVV, 660, 07/2019 !-->
        $userInputs = $request->all();
        var_dump($request->all());
        return($request->all());

        if(isset($request['selecionarPlano'])) {
//            dd($request);
            $firstVal = AssinaturaComerciante::where('idComerciante', '=', $request['id'])->count(); // . ' ' .
            //(User::with('Empresa')->where('id', '=',  $request['id'] )->get()
            //-> ));
            $secondVal = (DB::select(DB::raw('SELECT count(*) as contagem FROM brasilspot2.users
                        left join brasilspot2.empresas  on brasilspot2.empresas.idUsuario = brasilspot2.users.id
                        left join brasilspot2.filiais on brasilspot2.filiais.idEmpresa = brasilspot2.empresas.id
                        left join brasilspot2.assinaturasFiliais
                        on brasilspot2.assinaturasFiliais.idAssinatura = brasilspot2.filiais.id
                        where brasilspot2.users.id = ' . $request['idUsuario'] )));
            $soma = 0;
            if(isset($secondVal[0]->contagem)) {
                $soma = intval($secondVal[0]->contagem);

            }
            $soma += intval($firstVal);

            //TODO: pegar outra query porque a de cima não inclui o valor de cada um

            dd($soma);

            //each
//              id é idComerciante
//            idUsuario
//            selecionarPlano

            DB::beginTransaction();
            $transacao = null;
            //TODO: setar os valores pra gravar a transação
            try { //setar coisas na transacao, teria que criar a mudança de transicao tambem talvez
                $transacao = Transacao::create([
                    'fkEmpresa' => '1',
                    'fkCartao' => '1',
                    'fkEstadoTransacao' => '1',
                    'fkTipoTransacao' => '1',
                    'valorBruto' => '100,00', //amount em centavos
                    'cardHash' => $request['card_hash'],
                    'dataInicio' => date('d-m-y'),
                    'dataResposta' => date('d-m-y')
                ]);

            } catch (Exception $exception) {
                DB::rollBack();
                return 'Problema com banco';
            }
            DB::commit();

            Pagarme::setApiKey("ak_test_1jVGAUzxWNanzfTiW6yGX0cbA8Ywq7");

            $transaction = new PagarMe_Transaction(array(
                'amount' => strtr($transacao->valorBruto, array('.' => '', ',' => '')),
                'card_hash' => $request['card_hash']
            ));

            $transaction->charge();

            $status = $transaction->status; // status da transação
            return 'Tapago! ' . $status; //TODO: arrumar o redirect
        } else { //exemplo
            DB::beginTransaction();
            $transacao = null;
            try {
                $transacao = Transacao::create([
                    'fkEmpresa' => '1',
                    'fkCartao' => '1',
                    'fkEstadoTransacao' => '1',
                    'fkTipoTransacao' => '1',
                    'valorBruto' => '100,00', //amount em centavos
                    'cardHash' => $request['card_hash'],
                    'dataInicio' => date('d-m-y'),
                    'dataResposta' => date('d-m-y')
                ]);

            } catch (Exception $exception) {
                DB::rollBack();
                return 'Problema com banco';
            }
            DB::commit();

            Pagarme::setApiKey("ak_test_1jVGAUzxWNanzfTiW6yGX0cbA8Ywq7");

            $transaction = new PagarMe_Transaction(array(
                'amount' => strtr($transacao->valorBruto, array('.' => '', ',' => '')),
                'card_hash' => $request['card_hash']
            ));

            $transaction->charge();

            $status = $transaction->status; // status da transação
            return 'Tapago! ' . $status;
        }
    }
}
