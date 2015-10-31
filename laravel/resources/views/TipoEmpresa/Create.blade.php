@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarSistema')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Cadastro Tipo Empresa</h2>
        {{--<p class="text-caption">Por favor, nos informe seus dados e da sua empresa. Os dados abaixo <strong>NÃO</strong> serão divulgados no site.</p>--}}
        <!-- <p class="text-caption">Campos com (*) são obrigatórios</p> -->
        <!-- <p class="text-caption">Suas edições serão aprovadas dentro de 72hs.</p> -->

    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ route('TipoEmpresa.index') }}">Tipo Empresa</a></li>
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
        {!! Form::Open(['route' => 'TipoEmpresa.store', 'method' => 'POST']) !!}

        <div class="row">
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                {!! Form::label('tipo', 'Tipo *',null,['for' => 'tipo']) !!}
                {!! Form::text('tipo', null, ['id' => 'tipo']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 button-field">
                <a href="{{ route('TipoEmpresa.index') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
                    <span class="text-content">Voltar</span>
                </a>
            </div>
            <div class="form-group grid-m-3 grid-s-3 button-field">
                {!! Form::button('<span class="text-content">Cadastrar</span>',[
                    'id' => 'btnCadastrar',
                    'type' => 'submit',
                    'class' => 'btn btn-primary ripple'
                    ])!!}
            </div>
        </div>

        {!! Form::Close() !!}
    </div>
@endsection