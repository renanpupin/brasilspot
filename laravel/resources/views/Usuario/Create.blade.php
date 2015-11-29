@extends('layouts.master')


@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @can('AcessoComerciante')
    @include('layouts.sidebarComerciante')
    @endcan
    @can('AcessoVendedor')
    @include('layouts.sidebarVendedor')
    @endcan
    @can('AcessoAdministrador')
    @include('layouts.sidebarAdmin')
    @endcan
@stop

@section('content')
    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Cadastro Usuário</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ route('Usuario.index') }}">Usuário</a></li>
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

        {!! Form::Open(['route' => 'Usuario.store', 'method' => 'POST']) !!}

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            {!! Form::label('Nome') !!}
            {!! Form::text('name',null,['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('E-mail') !!}
            {!! Form::text('email',null,['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Perfis de Usuario *') !!}
            {!! Form::select('perfis', $perfis) !!}
        </div>

        <div class="form-group" id="divTipoVendedores" style="display: none">
            {!! Form::label('Tipos de Vendedores *') !!}
            {!! Form::select('tiposVendedores', $tiposVendedores) !!}
        </div>

        <div class="form-group" id="divMetas" style="display: none">
            {!! Form::label('Metas *') !!}
            {!! Form::select('metas', $metas) !!}
        </div>

        <div class="form-group" id="divPlanos" style="display: none">
            {!! Form::label('Planos') !!}
            {!! Form::select('planos', $planos) !!}
        </div>

        {!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}

        {!! Form::Close() !!}
    </div>
@stop

{{--@section('scripts')--}}
    {{--<script type="text/javascript" src="{!! asset('assets/js/usuario/usuario.js') !!}"></script>--}}
{{--@stop--}}