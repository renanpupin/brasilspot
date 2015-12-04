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

    <link rel="stylesheet" href="{{ asset('assets/css/dropzone.css') }}">


    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Pagamento</h2>
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

        {!! Form::Open(['url' => 'Pagamento/Efetivar', 'method' => 'POST', 'id' => 'payment_form']) !!}

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
    </div>

@stop


@section('script')
    <script type="text/javascript" src="{{ asset('assets/js/dropzone.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/configDropzone.js') }}"></script>
@stop
