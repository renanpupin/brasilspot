@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarComerciante')

@stop

@section('script')
    <script type="text/javascript" src="{!! asset('assets/js/pagarme_script_extra.js') !!}"></script>
    <script type="text/javascript" src="{{url('https://assets.pagar.me/js/pagarme.min.js')}}"></script>
    <script type="text/javascript" src="{{url('http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js')}}"></script>
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Pagamento Teste</h2>
    </div>

    {!! Form::Open(['url' => 'Pagamento/Calcular', 'method' => 'POST', 'id' => 'payment_form']) !!}

        Número do cartão: <input type="text" id="card_number"/>
        <br/>
        Nome (como escrito no cartão): <input type="text" id="card_holder_name"/>
        <br/>
        Mês de expiração: <input type="text" id="card_expiration_month"/>
        <br/>
        Ano de expiração: <input type="text" id="card_expiration_year"/>
        <br/>
        Código de segurança: <input type="text" id="card_cvv"/>
        <br/>
        <div id="field_errors">
        </div>
        <br/>
        <input id="card_form_submit" type="submit">
    {!! Form::Close() !!}
@stop