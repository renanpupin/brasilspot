<?php

namespace App\Http\Controllers;


use App\EstadoTransacao;
use App\HistoricoMudancaEstado;
use Auth;
use Validator;
use PagarMe;
use PagarMe_Transaction;
use PagarMe_Card;

use App\Transacao;
use App\Pagamento;

use DateTime;
use DateInterval;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use DB;
use BaseController;


class PagamentoController extends Controller
{
    public function prepararPagamentoGet(Request $request) { //Calcular
        //TODO: Bugs: forçar a pagina de calcular a nuna usar cache, forçar outras paginas a nunca permitir reenvio do formulario


        if (! Auth::check()) {
            Redirect::to('Login');
        }
            //passos para listar as pendencias:
        //pegar todas as assinaturas do usuario
        //para cada assinatura, pegar o pagamento mais recente
        //verificar se esta vencido ou não existe
            //adicionar na lista para pagamento
        //else
            //fazer nada
        $idUsuario = Auth::id();
    //identificador de pagamentos não considerou o caso 2015/01/25
        $assinaturasCliente = DB::table('assinaturas')
            ->select('assinaturas.id as id')
            ->join('comerciantes', 'assinaturas.idComerciante', '=', 'comerciantes.id')
            ->where('comerciantes.idUsuario', $idUsuario)
            ->get();

        $assinaturasParaPagar = null;
        foreach($assinaturasCliente as $single) {

            $candidato = DB::table('pagamentos')
                ->where('idAssinatura', $single->id)
                ->orderBy('validade', 'asc')
                ->first();

            if($candidato) { //existe pagamento
                if($candidato->isPaid == 1) { //foi pago?, entao verificar se precisa gerar o proximo ja
                    $todayMenosDez = new DateTime(date('y-m-d'));
                    $todayMenosDez = $todayMenosDez->sub(DateInterval::createFromDateString('10 days'));
                    $validations = new DateTime($candidato->validade);
                    $result = $todayMenosDez->diff($validations);
                    if($result->y == 0 && $result->m == 0 && !$result->invert && $result->d >= 10
                        || $result->invert) {
                            $assinaturasParaPagar[$single->id] = date("d-m-Y", strtotime($candidato->validade));
                    }
                }
                //TODO: tratar o caso de pagamentos que nunca ocorreram: boleto nunca pago, o cliente ainda vai querer tentar pagar novamente?
                //e tambem cartoes recusados
                //TODO: historico de transações, isso deve englobar o todo anterior e outros que passam despercebidos

            } else { //nunca existiu pagamento, criar o primeiro
                if (isset($candidato->validade)) {
                    $assinaturasParaPagar[$single->id] = date("d-m-Y", strtotime($candidato->validade));
                }
                else {
                    $assinaturasParaPagar[$single->id] = "";
                }
            }

        }
        $asCom = null;
        if (isset($assinaturasParaPagar)) {
            $asCom = DB::table('assinaturas')
                ->select(
                    DB::raw("'BAR' as validade"),
                    'planos.valor',
                    'assinaturas.id',
                    'empresas.nomeFantasia',
                    'comerciantes.idUsuario')
                ->join('assinaturasFiliais', 'assinaturasFiliais.idAssinatura', '=', 'assinaturas.id')
                ->join('filiais', 'assinaturasFiliais.idFilial', '=', 'filiais.id')
                ->join('empresas', 'empresas.id', '=', 'filiais.idEmpresa')
                ->join('planos', 'assinaturas.idPlano', '=', 'planos.id')
                ->join('comerciantes', 'assinaturas.idComerciante', '=', 'comerciantes.id')
                ->whereIn('assinaturas.id', array_keys($assinaturasParaPagar))
                ->where('comerciantes.idUsuario', $idUsuario)
                ->get();

            foreach($asCom as $values) {
                $values->valor = Transacao::convertePontotoVirgula($values->valor);
                $values->validade = $assinaturasParaPagar[$values->id];
            }
        }

        return view('Pagamento/Calcular', array("values" => $asCom));
    }

    public function create(Request $request)
    { //Pagamento/InfoCartao
        $inputArray = $request->all();

        if(!isset($inputArray['checkbox'])) {
            return Redirect::to('Pagamento\Calcular')->withErrors(['Nenhuma assinatura foi selecionada']);
        }
        Session::flash('checkbox', $inputArray['checkbox']); // or rather $result?


        $valorReal = Transacao::converteStringRStoPonto($inputArray['totalTotalis']);

        return view('Pagamento/InfoCartao')
            ->with("valorPagamento", "R$ ".str_replace('.',',',sprintf("%.2F",$valorReal)))
            ->with("dirtyValorPagamento", $valorReal);
    }

    public function store(Request $request)
    { //Pagamento/Efetivar
        $inputArray = $request->all();

        $checkboxes = Session::get('checkbox');

        if (!$checkboxes) {
            return Redirect::to('Pagamento\Calcular')->withErrors(['Nenhuma assinatura foi selecionada']);
        }

        $valorRealGet = 0.0;
        $idUsuario = Auth::id();
        $asCom = DB::table('assinaturas') //todas as assinaturas que serão pagas com esta transação
            ->join('assinaturasFiliais', 'assinaturasFiliais.idAssinatura', '=', 'assinaturas.id')
            ->join('filiais', 'assinaturasFiliais.idFilial', '=', 'filiais.id')
            ->join('empresas', 'empresas.id', '=', 'filiais.idEmpresa')
            ->join('planos', 'assinaturas.idPlano', '=', 'planos.id')
            ->join('comerciantes', 'assinaturas.idComerciante', '=', 'comerciantes.id')
            ->select('planos.valor', 'assinaturas.id as idAssinatura', 'empresas.nomeFantasia', 'comerciantes.idUsuario as idUsuario',
                'empresas.id as idEmpresa')
            ->whereIn('assinaturas.id', array_values($checkboxes)) //array(1 => 1, 2 => 2, 3 => 3, 4 => 4)))  //$checkboxes))
            ->get();



        foreach($asCom as $single) {
            $valorRealGet = $valorRealGet + $single->valor;
        }
        $valorRealGet = Transacao::getValorCentavos($valorRealGet);

        $inputArray['valorReal'] = $valorRealGet;

        $mensagensErro = array(
            'min' => 'Valor a ser pago invalido.',
            'numeric' => 'Valor a ser pago invalido.',
            'valor_pagamento_positivo_minimo_valido' => 'Valor a ser pago não pode ser inferior a 1',
        );
        Validator::extend(
            'valor_pagamento_positivo_minimo_valido',
            function ($attribute, $value, $parameters)
            {
                if (str_contains($value,'R$ ')) {
                    $floated = floatval(str_replace(',' , '.', ltrim($value,"R$ ") ));
                    if($floated < 1) {
                        return false;
                    }
                    else {
                        return true;
                    }
                } else {
                    return false;
                }
            }
        );

        $validator = Validator::make($inputArray, [
            'valorPagamento' => 'required|min:1|valor_pagamento_positivo_minimo_valido',
            'payment' => 'required',
            'valorReal' => 'required|min:1'
        ], $mensagensErro);

        if ($validator->fails()) {
            return Redirect::to('Pagamento/Calcular')->withErrors($validator);
        }

        Pagarme::setApiKey("ak_test_1jVGAUzxWNanzfTiW6yGX0cbA8Ywq7");


        $idEmpresa = $asCom[0]->idEmpresa;

        $transacao = null;
        $transacao = Transacao::create([
            'idUsuario' => $idUsuario,
            'idTipoTransacao' => Transacao::getTipoTransacao($inputArray['payment']),
            'idEstadoTransacao' => '1',
            'valorBruto' => $valorRealGet,
            'cardHash' => Transacao::getSkipCardHash($inputArray),
            'dataInicio' => date('y-m-d'),
            'dataResposta' => date('y-m-d')
        ]);

        HistoricoMudancaEstado::registrarHistoricoTransacao($transacao->id, EstadoTransacao::Criado);

        $dataValidade = new DateTime(date('y-m-d'));
       // $dataValidade = $dataValidade->add(DateInterval::createFromDateString('1 month')); //WRONG

        $assinaturasCliente = array_values($checkboxes);

        $assinaturasConfereData = null;
        foreach($assinaturasCliente as $single) {

            $candidato = DB::table('pagamentos')
                ->where('idAssinatura', $single)
                ->orderBy('validade', 'asc')
                ->first();

            if($candidato) { //existe pagamento
                if($candidato->isPaid == 1) { //foi pago?, entao pegar a data de vencimento e add1mes
                    $dataAntiga = new DateTime($candidato->validade);
                    $dataValidade = new DateTime(date('y-m-d'));
                    $checkDate = $dataValidade->diff($dataAntiga);
                    $dataValidade = $dataValidade->add(DateInterval::createFromDateString('1 month'));

                    if (!$checkDate->invert) {
                        $dataValidade->setDate($dataValidade->format('y'), $dataValidade->format('m'), $dataAntiga->format('d')); //set o mesmo dia do vencimento
                    } else {

                    }
                    $assinaturasConfereData[$single] = $dataValidade;
                }
            } else { //nunca existiu pagamento, criar o primeiro vencimento
                $dataValidade = new DateTime(date('y-m-d'));
                $assinaturasConfereData[$single] = $dataValidade->add(DateInterval::createFromDateString('1 month'));
            }
        }




        switch ($transacao->idTipoTransacao) {
            //TODO: fazer a pagina mostrando pagamento efetuado etc
            default:
            case 1:  //pagamentocartaosimples
                $transactionPagarMe = new PagarMe_Transaction(array(
                    'amount' => $transacao->valorBruto,
                    'card_hash' => $transacao->cardHash
                ));
                $transactionPagarMe->charge();


                if ($transactionPagarMe->status == 'paid') {
                    foreach($asCom as $single) {
                        $pagamento = Pagamento::create([

                            'isPaid' => 1,
                            'idUsuario' => $idUsuario,
                            'valor' => Transacao::converteCentavos($single->valor),
                            'dataPagamento' => date('y-m-d'),
                            'dataBaixa' => date('y-m-d'),
                            'idAssinatura' => $single->idAssinatura,
                            'idTransacao' => $transacao->id,
                            'validade' => $assinaturasConfereData[$single->idAssinatura]
                        ]);
                    }
                    $transacao->idEstadoTransacao = EstadoTransacao::Pago;
                    $transacao->save();
                    HistoricoMudancaEstado::registrarHistoricoTransacao($transacao->id, EstadoTransacao::Pago);
                    return "thank you " . $transactionPagarMe->status;

                } else {
                    HistoricoMudancaEstado::registrarHistoricoTransacao($transacao->id, EstadoTransacao::Recusado);
                    $transacao->idEstadoTransacao = EstadoTransacao::Recusado;
                    $transacao->save();
                    return "sorry " . $transactionPagarMe->status;
                }
                //TODO: fazer pagina informando o resultado do pagamento

            case 2: ///assinatura
                $transactionPagarMe = new PagarMe_Transaction(array(
                    'amount' => $transacao->valorBruto,
                    'card_hash' => $transacao->cardHash
                ));
                $transactionPagarMe->charge();
                $card = new PagarMe_Card(array(
                    'card_hash' => $transacao->cardHash
                ));
                $card->create();
                $card_id = $card->id;
                //$transacao->save();


                //TODO: criar CRONJOB para recobrar

                if ($transactionPagarMe->status == 'paid') {
                    foreach($asCom as $single) {
                        $pagamento = Pagamento::create([

                            'isPaid' => 1,
                            'idUsuario' => $idUsuario,
                            'valor' => Transacao::converteCentavos($single->valor),
                            'dataPagamento' => date('y-m-d'),
                            'dataBaixa' => date('y-m-d'),
                            'idAssinatura' => $single->idAssinatura,
                            'idTransacao' => $transacao->id,
                            'validade' => $assinaturasConfereData[$single->idAssinatura]
                        ]);
                    }

                    $transacao->idEstadoTransacao = EstadoTransacao::Pago;
                    $transacao->cardHashMensal = $card_id;
                    $transacao->save();

                    HistoricoMudancaEstado::registrarHistoricoTransacao($transacao->id, EstadoTransacao::Pago);
                    return "thank you " . $transactionPagarMe->status;

                } else {
                    HistoricoMudancaEstado::registrarHistoricoTransacao($transacao->id, EstadoTransacao::Recusado);
                    return "sorry " . $transactionPagarMe->status;
                }

                //return $status = $transactionPagarMe->status . ' ' . $card_id;

            case 3: //boleto

                $transaction = new PagarMe_Transaction(array(
                    'amount' => $transacao->valorBruto,
                    'payment_method' => "boleto"
                ));

                foreach($asCom as $single) {
                    $pagamento = Pagamento::create([

                        'isPaid' => 0,
                        'idUsuario' => $idUsuario,
                        'valor' => Transacao::converteCentavos($single->valor),
                        'dataPagamento' => date('y-m-d'),
                        'dataBaixa' => date('y-m-d'),
                        'idAssinatura' => $single->idAssinatura,
                        'idTransacao' => $transacao->id,
                        'validade' => $assinaturasConfereData[$single->idAssinatura]
                    ]);
                }

                $transaction->charge();
                $boleto_url = $transaction->boleto_url; // URL do boleto bancário
                $boleto_barcode = $transaction->boleto_barcode; // código de barras do boleto bancário

                $transacao->idEstadoTransacao = EstadoTransacao::PagamentoPendente;
                $transacao->numeroBoleto = $boleto_barcode;
                $transacao->save();
                HistoricoMudancaEstado::registrarHistoricoTransacao($transacao->id, EstadoTransacao::PagamentoPendente);

                //TODO: provavelmente gerar a pagina do boleto? no ambiente de teste só aparece
                return ($boleto_barcode . ' ' . $boleto_url);

        }
    }



}
