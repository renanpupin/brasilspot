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
        <h2>Nova Mensagem</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('SuasMensagens') }}">Suas Mensagens</a></li>
                    <li>Nova Mensagem</li>
                </ul>
            </div>
        </div>
    </div>


    <div id="cadastro" class="grid-m-12 grid-s-12 grid-xs-12">

        <div class="row">
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('destino', 'Destino',null,['for' => 'destino']) !!}
                <select name="destino">
                    <option>Selecione o destino da mensagem</option>
                    <option>Administração</option>
                    <option>Seus Clientes</option>
                </select>
            </div>
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('mensagem', 'Mensagem',null,['for' => 'mensagem']) !!}
                <textarea rows="5" name="mensagem"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 button-field">
                <a href="{{ url('SuasMensagens') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
                    <span class="text-content">Voltar</span>
                </a>
            </div>
            <div class="form-group grid-m-3 grid-s-3 button-field">
                {!! Form::button('<span class="text-content">Enviar</span>',[
                    'id' => 'btnEnviar',
                    'type' => 'submit',
                    'class' => 'btn btn-primary ripple'
                    ])!!}
            </div>
        </div>

    </div>

@stop