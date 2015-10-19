@extends('layouts.master')


@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarSistema')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Serviço #{{ $servico->id }}</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ route('Servico.index') }}">Serviço</a></li>
                    <li>Editar</li>
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

    <div id="cadastro" class="grid-m-12 grid-s-12">

        {!! Form::model($servico,['route' => ['Servico.update',$servico->id], 'method' => 'PUT']) !!}
        <div class="row">

            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('descricao', 'Descrição *',null,['for' => 'descricao']) !!}
                {!! Form::text('descricao',$servico->descricao,['id' => 'descricao']) !!}
            </div>

            <div class="row">
                <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 button-field">
                    {!! Form::button('<span class="text-content">Voltar</span>',[
                        'id' => 'btnVoltar',
                        'type' => 'button',
                        'class' => 'btn btn-secundary ripple',
                        ])!!}
                </div>
                <div class="form-group grid-m-3 grid-s-3 button-field">
                    {!! Form::button('<span class="text-content">Alterar</span>',[
                        'id' => 'btnAlterar',
                        'type' => 'submit',
                        'class' => 'btn btn-primary ripple'
                        ])!!}
                </div>
            </div>
        </div>

        {!! Form::Close() !!}

    </div>
@stop