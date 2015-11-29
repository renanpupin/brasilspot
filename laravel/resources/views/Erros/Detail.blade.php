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
        <h2>Erro #{{ $erro->id }}</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('Erros') }}">Erros</a></li>
                    <li>Detalhar</li>
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
                {!! Form::label('usuario', 'Usuário',null,['for' => 'usuario']) !!}
                <p class="field-disabled">{{ $erro->Usuario->name }}</p>
            </div>
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('descricao', 'Descrição',null,['for' => 'descricao']) !!}
                <p class="field-disabled">{{ $erro->descricao }}</p>
            </div>
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('is_corrigido', 'Corrigido',null,['for' => 'is_corrigido']) !!}
                @if($erro->isCorrigido)
                    <p class="field-disabled">SIM</p>
                @endif
                @if(!$erro->isCorrigido)
                    <p class="field-disabled">NÃO</p>
                @endif
            </div>

            <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 grid-xs-12 button-field">
                <a href="{{ url('Erros') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
                    <span class="text-content">Voltar</span>
                </a>
            </div>
            @if(!$erro->isCorrigido)
                <div class="form-group grid-m-3 grid-s-3 grid-xs-12 button-field">
                    <a href="{{ url('Erros/aprovar',$erro->id) }}" id="btnAprovar" title="Aprovar" class="btn btn-primary ripple">
                        <span class="text-content">Aprovar</span>
                    </a>
                </div>
            @endif

            @if($erro->isCorrigido)
                <div class="form-group grid-m-3 grid-s-3 grid-xs-12 button-field">
                    <a href="{{ url('Erros/aprovar',$erro->id) }}" id="btnAprovar" title="Aprovar"  class="btn btn-primary ripple" style="pointer-events: none;">
                        <span class="text-content">Aprovar</span>
                    </a>
                </div>
            @endif
        </div>


    </div>
@stop