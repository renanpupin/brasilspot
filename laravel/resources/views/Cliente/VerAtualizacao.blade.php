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
        <h2>Cliente #5</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('Clientes/Atualizacoes') }}">Clientes</a></li>
                    <li>Atualização</li>
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

    <div id="detalhar" class="grid-m-12 grid-s-12">


        <div class="row">

            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('nome', 'Nome',null,['for' => 'nome']) !!}
                <p class="field-disabled">José de Silva</p>
            </div>
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('email', 'Email',null,['for' => 'email']) !!}
                <p class="field-disabled">josesilva@email.com</p>
            </div>
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('perfis', 'Perfil',null,['for' => 'perfis']) !!}
                <p class="field-disabled">Comerciante</p>
            </div>

            <div class="form-group grid-m-3 grid-m-offset-3 grid-s-3 grid-s-offset-3 grid-xs-12 button-field">
                <a href="{{ url('Clientes/Atualizacoes') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
                    <span class="text-content">Voltar</span>
                </a>
            </div>
            <div class="form-group grid-m-3 grid-s-3 grid-xs-12 button-field">
                <a href="{{ url('Clientes/reprovar/1') }}" id="btnReprovar" title="Reprovar" class="btn btn-cancel ripple">
                    <span class="text-content">Reprovar</span>
                </a>
            </div>
            <div class="form-group grid-m-3 grid-s-3 grid-xs-12 button-field">
                <a href="{{ url('Clientes/aprovar/1') }}" id="btnEditar" title="Aprovar" class="btn btn-primary ripple">
                    <span class="text-content">Aprovar</span>
                </a>
            </div>
        </div>


    </div>
@stop