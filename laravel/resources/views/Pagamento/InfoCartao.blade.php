@extends('layouts.master')

@section('title', 'Pagamento!')

@section('sidebar')
    @parent
    @can('AcessoComerciante')
    @include('layouts.sidebarComerciante')
    @endcan
    @can('AcessoVendedor')
    @include('layouts.sidebarVendedor')
    @endcan
    @can('AcessoAdministrador')
    @include('layouts.sidebarAdmin')
    @endcan
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Dados do Cartão</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('Pagamento/Calcular') }}">Pagamento de Assinaturas</a></li>
                </ul>
            </div>
        </div>
    </div>

    @if(Session::has('flash_message'))
        <div class="grid-m-12 grid-s-12 grid-xs-12">
            <div class="alert alert-success" role="alert">
                <button type="button" class="close-alert">×</button>
                <i class="material-icons">done</i>
                {{ Session::get('flash_message') }}
            </div>
        </div>
    @endif
    @if($errors->any())
        <div class="grid-m-12 grid-s-12 grid-xs-12">
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close-alert">×</button>
                @foreach($errors->all() as $error)
                    <p><i class="material-icons">error_outline</i>{{ $error }}</p>
                @endforeach
            </div>
        </div>
    @endif

    <div id="cadastro" class="grid-m-12 grid-s-12 grid-xs-12">

        {!! Form::Open(['url' => 'Pagamento/Efetivar', 'method' => 'POST', 'id' => 'payment_form', "class" => "form-group"]) !!}
            {!! Form::hidden('valorPagamento', $valorPagamento, null, null) !!}
        <div>
            <h4> Forma de cobrança</h4>
            <br/>
            <div>
                <input required class="group-required" name="payment" type="radio" value="boleto" id="boletoBoleto"> {{ $valorPagamento }} no boleto
            </div>
            <div>
                <input required class="cartaoRequerido" name="payment" type="radio" value="unico"> {{ $valorPagamento }} apenas para este mês no cartão
            </div>
            <div>
                <input required class="cartaoRequerido" name="payment" type="radio" value="mensal"> {{ $valorPagamento }} mensalmente no cartão
            </div>
        </div>
        <br/>
        <div class="dadosCartaoShowHide">
            Número do cartão: <input required class="removeName" type="text" id="card_number" name="card_number"/>
            <br/>
            Nome (como escrito no cartão): <input class="removeName" type="text" id="card_holder_name" name="card_holder_name"/>
            <br/>
            Mês de expiração: <input required class="removeName" type="text" id="card_expiration_month" name="card_expiration_month"/>
            <br/>
            Ano de expiração: <input required class="removeName" type="text" id="card_expiration_year" name="card_expiration_year"/>
            <br/>
            Código de segurança: <input required class="removeName" type="text" id="card_cvv" name="card_cvv"/>
            <br/>
            <div id="field_errors">
            </div>
            <br/>
        </div>
        <input name="card_form_submit" id="card_form_submit" type="submit" value="Pagar">
        {!! Form::Close() !!}
    </div>

@stop


@section('script')
    <script type="text/javascript" src="{!! asset('assets/js/pagarme_script_extra.js') !!}"></script>
    <script type="text/javascript" src="{{url('https://assets.pagar.me/js/pagarme.min.js')}}"></script>
    <script type="text/javascript" src="{{url('http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js')}}"></script>
@stop
