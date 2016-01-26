@extends('layouts.master')

@section('title', 'Bem vindo!')

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
        <h2>Adicionar Assinaturas</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('assinaturas') }}">Assinaturas</a></li>
                    <li>Adicionar</li>
                </ul>
            </div>
        </div>
    </div>

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

        {!! Form::Open(['route' => 'Comerciante.adicionarAssinaturas', 'method' => 'POST']) !!}
        <div class="row">

            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('qtdAssinaturas', 'Quantidade de Assinaturas *',null,['for' => 'qtdAssinaturas']) !!}
                <button type="button" class="btn ripple btnCountChange btnCountChangeMinus">-</button>
                {!! Form::text('qtdAssinaturas',0,['id' => 'qtdAssinaturas', 'class' => 'qtdAssinaturas', 'readonly' => 'readonly', 'style' => 'width: 75px;']) !!}
                <button type="button" class="btn ripple btnCountChange btnCountChangePlus btn-primary">+</button>
            </div>
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('total', 'Total',null,['for' => 'total']) !!}
                {!! Form::text("total", "R$ 0,00", ['readonly' => 'readonly', 'id' => 'total' ] ) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 button-field">
                <a href="{{ url('assinaturas') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
                    <span class="text-content">Voltar</span>
                </a>
            </div>
            <div class="form-group grid-m-3 grid-s-3 button-field">
                {!! Form::button('<span class="text-content">Assinar</span>',[
                    'id' => 'btnAssinar',
                    'type' => 'submit',
                    'class' => 'btn btn-primary ripple'
                    ])!!}
            </div>
        </div>

        {!! Form::Close() !!}

    </div>

@stop

@section('script')
    <script type="text/javascript" src="{!! asset('assets/js/assinaturas/assinatura.js') !!}"></script>
@stop