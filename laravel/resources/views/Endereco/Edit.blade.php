@extends('layouts.master')


@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarSistema')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Editar Endereço</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ route('Endereco.index') }}">Endereço</a></li>
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

        {!! Form::model($endereco,['route' => ['Endereco.update',$endereco->id], 'method' => 'PUT']) !!}
        <div class="row">
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                {!! Form::label('endereco', 'Endereço *',null,['for' => 'endereco']) !!}
                {!! Form::text('endereco',$endereco->endereco,['id' => 'endereco']) !!}
            </div>

            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                {!! Form::label('bairro', 'Bairro *',null,['for' => 'bairro']) !!}
                {!! Form::text('bairro',$endereco->bairro,['id' => 'bairro']) !!}
            </div>

            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                {!! Form::label('cidade', 'Cidade *',null,['for' => 'cidade']) !!}
                {!! Form::text('cidade',$endereco->cidade,['id' => 'cidade']) !!}
            </div>

            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                {!! Form::label('estado', 'Estado *',null,['for' => 'estado']) !!}
                {!! Form::text('estado',$endereco->estado,['id' => 'estado']) !!}
            </div>

            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                {!! Form::label('coordenada', 'Coordenada *',null,['for' => 'coordenada']) !!}
                {!! Form::text('coordenada',$endereco->coordenada,['id' => 'coordenada']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 button-field">
                <a href="{{ route('Endereco.index') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
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