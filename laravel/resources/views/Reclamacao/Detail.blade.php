@extends('layouts.master')


@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarVendedor')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Reclamação #5</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('Clientes/Reclamacoes') }}">Reclamações</a></li>
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
                <p class="field-disabled">{{ $reclamacao->Usuario->name }}</p>
            </div>
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('descricao', 'Descrição',null,['for' => 'descricao']) !!}
                <p class="field-disabled">{{ $reclamacao->descricao }}</p>
            </div>
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('is_visualizada', 'Visualizada',null,['for' => 'is_visualizada']) !!}
                @if($reclamacao->isVisualizada)
                    <p class="field-disabled">SIM</p>
                @endif

                @if(!$reclamacao->isVisualizada)
                    <p class="field-disabled">NÃO</p>
                @endif
            </div>

            @if($reclamacao->isVisualizada == 1)
                <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 grid-xs-12 button-field">
                    <a href="{{ url('Clientes/Reclamacoes') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
                        <span class="text-content">Voltar</span>
                    </a>
                </div>
            @endif
            @if($reclamacao->isVisualizada == 0)
                <div class="form-group grid-m-3 grid-s-3 grid-xs-12 button-field">
                    <a href="{{ url('Clientes/Reclamacoes') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
                        <span class="text-content">Voltar</span>
                    </a>
                </div>
            @endif

            @if($reclamacao->isVisualizada == 0)
                <div class="form-group grid-m-3 grid-s-3 grid-xs-12 button-field">
                    <a href="{{ url('Clientes/Reclamacoes/visualizar',[$reclamacao->id]) }}" id="btnVisualizar" title="Visualizar" class="btn btn-primary ripple">
                        <span class="text-content">Visualizar</span>
                    </a>
                </div>
            @endif
        </div>


    </div>
@stop