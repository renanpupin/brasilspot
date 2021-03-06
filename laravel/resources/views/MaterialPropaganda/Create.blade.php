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
        <h2>Solicitar Material de Propaganda</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('Solicitacoes/MaterialPropaganda') }}">Material de Propaganda</a></li>
                    <li>Solicitar</li>
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

        {!! Form::Open(['route' => 'MaterialPropaganda.store', 'method' => 'POST']) !!}
            <div class="row">
                <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                    {!! Form::label('descricao', 'Descrição *',null,['for' => 'descricao']) !!}
                    {!! Form::textarea('descricao',null,['id' => 'descricao', 'rows' => 3]) !!}
                </div>
                <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                    {!! Form::label('motivo', 'Motivo *',null,['for' => 'motivo']) !!}
                    {!! Form::textarea('motivo',null,['id' => 'motivo', 'rows' => 3]) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6  grid-xs-6 button-field">
                    <a href="{{ url('Solicitacoes/MaterialPropaganda') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
                        <span class="text-content">Voltar</span>
                    </a>
                </div>
                <div class="form-group grid-m-3 grid-s-3 grid-xs-6 button-field">
                    {!! Form::button('<span class="text-content">SOLICITAR</span>',[
                        'id' => 'btnEnviar',
                        'type' => 'submit',
                        'class' => 'btn btn-primary ripple'
                        ])!!}
                </div>
            </div>


        {!! Form::Close() !!}

    </div>
@stop