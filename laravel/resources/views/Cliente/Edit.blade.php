@extends('layouts.master')


@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarVendedor')
@stop

@section('content')
    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Cadastro de Cliente</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('Clientes/Gerenciar') }}">Cliente</a></li>
                    <li>Cadastrar</li>
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

        {!! Form::Open(['route' => 'Clientes.store', 'method' => 'POST']) !!}
        <div class="row">
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('nome', 'Nome *',null,['for' => 'nome']) !!}
                {!! Form::text('nome',null,['id' => 'nome']) !!}
            </div>

            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('email', 'E-Mail *',null,['for' => 'email']) !!}
                {!! Form::text('email',null,['class' => 'form-control']) !!}
            </div>

            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('password', 'Senha *',null,['for' => 'password']) !!}
                {!! Form::password('password',null,['class' => 'form-control']) !!}
            </div>

            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('perfis', 'Perfil *',null,['for' => 'perfis']) !!}
                {!! Form::select('perfis', $perfis) !!}
            </div>
        </div>


        <div class="row">
            <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-xs-12 grid-s-offset-6 button-field">
                <a href="{{ url('Clientes/Gerenciar') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
                    <span class="text-content">Voltar</span>
                </a>
            </div>
            <div class="form-group grid-m-3 grid-s-3 grid-xs-12 button-field">
                {!! Form::button('<span class="text-content">Editar</span>',[
                    'id' => 'btnEditar',
                    'type' => 'submit',
                    'class' => 'btn btn-primary ripple'
                    ])!!}
            </div>
        </div>

        {!! Form::Close() !!}
    </div>
@stop