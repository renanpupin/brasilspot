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

use App\Transacao;
use App\TipoTransacao;
use App\EstadoTransacao;
use App\Comerciante;
use App\PerfilUsuario;
use App\User;
use App\Vendedor;

use DB;
use BaseController;


class PagamentoController extends Controller
{


    public function prepararPagamentoAtualizar(Request $request) {


        return $request->all();
    }

    public function prepararPagamento() {



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { //Pagamento/Confirmar

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { //Pagamento/Efetivar
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
