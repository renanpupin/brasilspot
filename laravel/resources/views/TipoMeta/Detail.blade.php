@extends('layouts.master')


@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarAdmin')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Tipo de Meta #{{ $tipoMeta->id }}</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ route('TipoMeta.index') }}">Tipo de Meta</a></li>
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
                {!! Form::label('descricao', 'Descrição',null,['for' => 'descricao']) !!}
                {{--<input type="text" value="{{ $tipoMeta->descricao }}" disabled>--}}
                <p class="field-disabled">{{ $tipoMeta->descricao }}</p>
            </div>

                <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 button-field">
                    <a href="{{ route('TipoMeta.index') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
                        <span class="text-content">Voltar</span>
                    </a>
                </div>
                <div class="form-group grid-m-3 grid-s-3 button-field">
                    <a href="{{ url('TipoMeta/editar/'.$tipoMeta->id) }}" id="btnEditar" title="Editar" class="btn btn-primary ripple">
                        <span class="text-content">Editar</span>
                    </a>
                </div>
        </div>


    </div>
@stop