@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarComerciante')

@stop


@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Pagamento Teste</h2>
    </div>

    <form id="payment_form" action="https://seusite.com.br/transactions/new" method="POST">
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
        <input type="submit"></input>
    </form>

    <!-- SCRIPTS SECTION -->
    <script type="text/javascript" src="{{url('https://assets.pagar.me/js/pagarme.min.js')}}"></script>
    <script type="text/javascript" src="{{url('http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js')}}"></script>
    @yield('script')
@stop