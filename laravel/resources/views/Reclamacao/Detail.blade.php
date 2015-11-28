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
        <h2>Reclamação #5</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    @can('AcessoComerciante')
                        <li><a href="{{ url('Comerciante/Reclamacoes') }}">Reclamações</a></li>
                    @endcan
                    @can('AcessoAdministrador')
                        <li><a href="{{ url('Administrador/Reclamacoes') }}">Reclamações</a></li>
                    @endcan
                    @can('AcessoVedendor')
                        <li><a href="{{ url('Vendedor/Reclamacoes') }}">Reclamações</a></li>
                    @endcan
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
                {!! Form::label('usuario', 'Usuário',null,['for' => 'usuario']) !!}
                <p class="field-disabled">{{ $reclamacao->Usuario->name }}</p>
            </div>
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('descricao', 'Descrição',null,['for' => 'descricao']) !!}
                <p class="field-disabled">{{ $reclamacao->descricao }}</p>
            </div>
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('is_visualizada', 'Visualizada',null,['for' => 'is_visualizada']) !!}
                @if($reclamacao->isVisualizada)
                    <p class="field-disabled">SIM</p>
                @endif

                @if(!$reclamacao->isVisualizada)
                    <p class="field-disabled">NÃO</p>
                @endif
            </div>

            @if($reclamacao->isVisualizada == 1)
                @can('AcessoComerciante')
                <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 grid-xs-12 button-field">
                    <a href="{{ url('Comerciante/Reclamacoes') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
                        <span class="text-content">Voltar</span>
                    </a>
                </div>
                @endcan
                @can('AcessoAdministrador')
                <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 grid-xs-12 button-field">
                    <a href="{{ url('Vendedor/Reclamacoes') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
                        <span class="text-content">Voltar</span>
                    </a>
                </div>
                @endcan
                {{--@can('AcessoVedendor')--}}
                {{--<div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 grid-xs-12 button-field">--}}
                    {{--<a href="{{ url('Vendendor/Reclamacoes') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">--}}
                        {{--<span class="text-content">Voltar</span>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--@endcan--}}
            @endif

            @if($reclamacao->isVisualizada == 0)
                @can('AcessoComerciante')
                <div class="form-group grid-m-3 grid-s-3 grid-xs-12 button-field">
                    <a href="{{ url('Comerciante/Reclamacoes') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
                        <span class="text-content">Voltar</span>
                    </a>
                </div>
                @endcan
                @can('AcessoAdministrador')
                <div class="form-group grid-m-3 grid-s-3 grid-xs-12 button-field">
                    <a href="{{ url('Vendedor/Reclamacoes') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
                        <span class="text-content">Voltar</span>
                    </a>
                </div>
                @endcan
                {{--@can('AcessoVedendor')--}}
                {{--<div class="form-group grid-m-3 grid-s-3 grid-xs-12 button-field">--}}
                    {{--<a href="{{ url('Vendedor/Reclamacoes') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">--}}
                        {{--<span class="text-content">Voltar</span>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--@endcan--}}
            @endif

            @if($reclamacao->isVisualizada == 0)
                @can('AcessoComerciante')
                <div class="form-group grid-m-3 grid-s-3 grid-xs-12 button-field">
                    <a href="{{ url('Comerciante/Reclamacoes/visualizar',[$reclamacao->id]) }}" id="btnVisualizar" title="Visualizar" class="btn btn-primary ripple">
                        <span class="text-content">Visualizar</span>
                    </a>
                </div>
                @endcan
                @can('AcessoAdministrador')
                <div class="form-group grid-m-3 grid-s-3 grid-xs-12 button-field">
                    <a href="{{ url('Vendedor/Reclamacoes/visualizar',[$reclamacao->id]) }}" id="btnVisualizar" title="Visualizar" class="btn btn-primary ripple">
                        <span class="text-content">Visualizar</span>
                    </a>
                </div>
                @endcan
                {{--@can('AcessoVedendor')--}}
                {{--<div class="form-group grid-m-3 grid-s-3 grid-xs-12 button-field">--}}
                    {{--<a href="{{ url('Vendedor/Reclamacoes/visualizar',[$reclamacao->id]) }}" id="btnVisualizar" title="Visualizar" class="btn btn-primary ripple">--}}
                        {{--<span class="text-content">Visualizar</span>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--@endcan--}}
            @endif
        </div>


    </div>
@stop