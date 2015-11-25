@extends('layouts.master')


@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarComerciante')
@stop

@section('content')
    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Perfil</h2>
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

        {!! Form::model($usuario,['route' => ['Usuario.edit',$usuario->id], 'method' => 'PUT']) !!}
        <div class="row">
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('name', 'Nome *',null,['for' => 'name']) !!}
                {!! Form::text('name',null,['id' => 'name']) !!}
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
                {!! Form::label('passwordConfirm', 'Confirme sua senha *',null,['for' => 'passwordConfirm']) !!}
                {!! Form::password('passwordConfirm',null,['class' => 'form-control']) !!}
            </div>
        </div>


        <div class="row">
            {{--<div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-xs-12 grid-s-offset-6 button-field">--}}
                {{--<a href="{{ url('Clientes/Gerenciar') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">--}}
                    {{--<span class="text-content">Voltar</span>--}}
                {{--</a>--}}
            {{--</div>--}}
            <div class="form-group grid-m-3 grid-m-offset-9 grid-s-3 grid-xs-12 grid-s-offset-9 button-field">
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