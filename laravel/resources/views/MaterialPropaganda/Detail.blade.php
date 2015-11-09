@extends('layouts.master')


@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarVendedor')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Requisição de Material #31</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('Solicitacoes/MaterialPropaganda') }}">Material de Propaganda</a></li>
                    <li>Avaliar</li>
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
                <p class="field-disabled">José de Silva</p>
            </div>
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('descricao', 'Descrição',null,['for' => 'descricao']) !!}
                <p class="field-disabled">Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</p>
            </div>
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('motivo', 'Motivo',null,['for' => 'motivo']) !!}
                <p class="field-disabled">Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</p>
            </div>
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('is_aprovado', 'Aprovado',null,['for' => 'is_aprovado']) !!}
                <p class="field-disabled">NÃO</p>
            </div>

            <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 grid-xs-12 button-field">
                <a href="{{ url('Solicitacoes/MaterialPropaganda/reprovar/1') }}" id="btnReprovar" title="Aprovar" class="btn btn-secundary ripple">
                    <span class="text-content">Reprovar</span>
                </a>
            </div>
            <div class="form-group grid-m-3 grid-s-3 grid-xs-12 button-field">
                <a href="{{ url('Solicitacoes/MaterialPropaganda/aprovar/1') }}" id="btnAprovar" title="Aprovar" class="btn btn-primary ripple">
                    <span class="text-content">Aprovar</span>
                </a>
            </div>
        </div>


    </div>
@stop