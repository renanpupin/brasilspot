@extends('layouts.master')


@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarSistema')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Categoria #{{ $categoria->id }}</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ route('Categoria.index') }}">Categoria</a></li>
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

    <div id="editar" class="grid-m-12 grid-s-12 grid-xs-12">

        {!! Form::model($categoria,['route' => ['Categoria.update',$categoria->id], 'method' => 'PUT']) !!}
        <div class="row">

            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('nome', 'Nome *',null,['for' => 'nome']) !!}
                {!! Form::text('nome', $categoria->nome,['id' => 'nome']) !!}
            </div>

            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="idCategoriaPai">Categoria Principal</label>
                <select id="idCategoriaPai" name="idCategoriaPai">
                    <option value="-1">Selecione a categoria da empresa</option>
                    <option value="1">Promoção</option>
                    <option value="2">Alimentos e Bebidas</option>
                    <option value="3">Animais</option>
                    <option value="4">Arte e cultura</option>
                    <option value="5">Automóveis e veículos</option>
                </select>
                <p class="input-hint">(Não selecione caso a categoria cadastrada seja a principal)</p>
            </div>
        </div>
        <div class="row">
            <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 button-field">
                <a href="{{ route('Categoria.index') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
                    <span class="text-content">Voltar</span>
                </a>
            </div>
            <div class="form-group grid-m-3 grid-s-3 button-field">
                {!! Form::button('<span class="text-content">Alterar</span>',[
                    'id' => 'btnAlterar',
                    'type' => 'submit',
                    'class' => 'btn btn-primary ripple'
                    ])!!}
            </div>
        </div>


        {!! Form::Close() !!}

    </div>
@stop