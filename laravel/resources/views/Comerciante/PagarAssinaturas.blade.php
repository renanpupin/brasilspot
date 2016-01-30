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
        <h2>Pagar Assinaturas</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('assinaturas/adicionar') }}">Assinaturas</a></li>
                    <li>Pagar</li>
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

        <p>Pagar {{$numeroAssinaturas}} assinaturas.</p>
        <p>Valor Total: <b>R$ {{number_format(($numeroAssinaturas*24.90), 2, ',', '')}}</b></p>

        {!! Form::Open(['url' => 'Pagamento/Efetivar', 'method' => 'POST', 'id' => 'payment_form', "class" => "form-group"]) !!}
            {!! Form::hidden('numeroAssinaturas', $numeroAssinaturas, null, null) !!}
            <div class="row">
                <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                    {!! Form::label('card_number', 'Número do cartão *',null,['for' => 'card_number']) !!}
                    <input required class="removeName" type="text" id="card_number" name="card_number"/>
                </div>
                <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                    {!! Form::label('card_holder_name', 'Nome (como escrito no cartão) *',null,['for' => 'card_holder_name']) !!}
                    <input class="removeName" type="text" id="card_holder_name" name="card_holder_name"/>
                </div>
                <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                    {!! Form::label('card_expiration_month', 'Mês de expiração *',null,['for' => 'card_expiration_month']) !!}
                    <input required class="removeName" type="text" id="card_expiration_month" name="card_expiration_month"/>
                </div>
                <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                    {!! Form::label('card_expiration_year', 'Ano de expiração *',null,['for' => 'card_expiration_year']) !!}
                    <input required class="removeName" type="text" id="card_expiration_year" name="card_expiration_year"/>
                </div>
                <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                    {!! Form::label('card_cvv', 'Código de segurança *',null,['for' => 'card_cvv']) !!}
                    <input required class="removeName" type="text" id="card_cvv" name="card_cvv"/>
                </div>

                <div id="field_errors" class="form-group grid-m-12 grid-s-12 grid-xs-12"></div>

            </div>
            <div class="row">
                <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 button-field">
                    <a href="{{ url('assinaturas') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
                        <span class="text-content">Voltar</span>
                    </a>
                </div>
                <div class="form-group grid-m-3 grid-s-3 button-field">
                    {!! Form::button('<span class="text-content">Pagar</span>',[
                        'id' => 'card_form_submit',
                        'type' => 'submit',
                        'class' => 'btn btn-primary ripple',
                        'name' => 'card_form_submit'
                        ])!!}
                </div>

            </div>
        {!! Form::Close() !!}
    </div>

@stop


@section('script')
    <script type="text/javascript" src="{!! asset('assets/js/pagarme_script_extra.js') !!}"></script>
    <script type="text/javascript" src="{{url('https://assets.pagar.me/js/pagarme.min.js')}}"></script>
    <script type="text/javascript" src="{{url('http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js')}}"></script>
@stop
