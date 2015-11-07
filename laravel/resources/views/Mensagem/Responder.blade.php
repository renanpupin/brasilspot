@extends('layouts.master')


@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    {{--se perfil for de vendedor carregar sidebarVendedor, se for comerciante sidebarComerciante--}}
    @include('layouts.sidebarComerciante')
@stop

@section('content')


    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Responder Mensagem #1</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('SuasMensagens') }}">Suas Mensagens</a></li>
                    <li>Responder</li>
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
                {!! Form::label('remetente', 'Remetente',null,['for' => 'remetente']) !!}
                <p class="field-disabled">José de Silva</p>
            </div>
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('email', 'Email',null,['for' => 'email']) !!}
                <p class="field-disabled">jose@email.com</p>
            </div>
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('data', 'Data',null,['for' => 'data']) !!}
                <p class="field-disabled">12/11/2015</p>
            </div>
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('hora', 'Hora',null,['for' => 'hora']) !!}
                <p class="field-disabled">12:20</p>
            </div>
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('resposta', 'Resposta',null,['for' => 'resposta']) !!}
                <textarea rows="5"></textarea>
            </div>
            <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 grid-xs-12 button-field">
                <a href="{{ url('SuasMensagens') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
                    <span class="text-content">Voltar</span>
                </a>
            </div>

            <div class="form-group grid-m-3 grid-s-3 grid-xs-12 button-field">
                <a href="{{ url('Mensagem/responder/1') }}" id="btnResponder" title="Responder" class="btn btn-primary ripple">
                    <span class="text-content">Responder</span>
                </a>
            </div>
        </div>


    </div>
@stop