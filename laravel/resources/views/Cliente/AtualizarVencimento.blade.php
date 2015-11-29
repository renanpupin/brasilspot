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
        <h2>Atualizar Vencimento</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('Clientes/Gerenciar') }}">Clientes</a></li>
                    <li>Atualizar Vencimento</li>
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

    <div id="editar" class="grid-m-12 grid-s-12 grid-xs-12">

        {!! Form::Open(['route' => 'Cliente.atualizarVencimentoStore', 'method' => 'POST']) !!}
        <div class="row">

            {!! Form::text('id',$usuario->Comerciante->id,['hidden']) !!}

            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('cliente', 'Cliente',null,['for' => 'cliente']) !!}
                <p class="field-disabled">{{ $usuario->name }}</p>
            </div>
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('plano', 'Plano',null,['for' => 'plano']) !!}
                <select id="selecionarPlano" name="selecionarPlano">
                    <option value="1">Básico</option>
                    <option value="2">Pro</option>
                </select>
            </div>
            @if($usuario->Comerciante->AssinaturaComerciante != null)
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('dataVencimento', 'Data de Vencimento do Plano',null,['for' => 'dataVencimento']) !!}
                {!! Form::text('dataVencimento',$usuario->Comerciante->AssinaturaComerciante->Assinatura->dataVencimento,['class' => 'form-control']) !!}
            </div>
            @endif
            @if($usuario->Comerciante->AssinaturaComerciante == null)
                <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('dataVencimento', 'Data de Vencimento do Plano',null,['for' => 'dataVencimento']) !!}
                {!! Form::text('dataVencimento','',['class' => 'form-control']) !!}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 button-field">
                <a href="{{ url('Clientes/Gerenciar') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
                    <span class="text-content">Voltar</span>
                </a>
            </div>
            <div class="form-group grid-m-3 grid-s-3 button-field">
                {!! Form::button('<span class="text-content">Atualizar</span>',[
                    'id' => 'btnAtualizar',
                    'type' => 'submit',
                    'class' => 'btn btn-primary ripple'
                    ])!!}
            </div>
        </div>

        {!! Form::Close() !!}

    </div>
@stop