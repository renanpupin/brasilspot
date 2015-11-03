@extends('layouts.master')


@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarSistema')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Editar Usuário</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ route('Categoria.index') }}">Usuário</a></li>
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

    <div id="editar" class="grid-m-12 grid-s-12">

        {!! Form::model($usuario,['route' => ['Usuario.update',$usuario->id], 'method' => 'PUT']) !!}
        <div class="row">
            <div class="form-group">
                {!! Form::label('Nome') !!}
                {!! Form::text('name',$usuario->name,['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('E-mail') !!}
                {!! Form::text('email',$usuario->email,['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Perfis de Usuario *') !!}
                {!! Form::select('perfis', $perfis, $usuario->idPerfilUsuario) !!}
            </div>

            @if($usuario->PlanoUsuario != null)
                <div class="form-group">
                    {!! Form::label('Planos') !!}
                    {!! Form::select('planos', $planos, $usuario->PlanoUsuario->Plano->id) !!}
                </div>
            @endif
            @if($usuario->PlanoUsuario == null)
                <div class="form-group">
                    {!! Form::label('Planos') !!}
                    {!! Form::select('planos', $planos) !!}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 button-field">
                <a href="{{ route('Usuario.index') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
                    <span class="text-content">Voltar</span>
                </a>
            </div>
            <div class="form-group grid-m-3 grid-s-3 button-field">
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