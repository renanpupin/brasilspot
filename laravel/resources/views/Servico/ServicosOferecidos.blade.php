@extends('layouts.master')


@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarComerciante')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Selecionar Serviços</h2>
        <p>Selecione os serviços oferecidos por sua empresa</p>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('ServicosOferecidos') }}">Serviços Oferecidos</a></li>
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

    <div id="cadastro" class="grid-m-12 grid-s-12 grid-xs-12">

        {!! Form::Open(['route' => 'Servico.gravarSelecionados', 'method' => 'POST']) !!}
        <div class="row">
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                {!! Form::label('servicos', 'Selecione os serviços',null,['for' => 'servicos']) !!}
            </div>

            @foreach($servicos as $servico)
                <div class="form-group grid-m-6 grid-s-6 grid-xs-12">
                    {!! Form::checkbox('servicos[]', $servico->id, in_array($servico->id, $servicos_selecionados), ['class' => 'field']) !!} {{$servico->descricao}}
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="form-group grid-m-3 grid-s-3 grid-m-offset-9 grid-s-offset-9 grid-xs-12 button-field">
                {!! Form::button('<span class="text-content">Salvar</span>',[
                    'id' => 'btnSalvar',
                    'type' => 'submit',
                    'class' => 'btn btn-primary ripple'
                    ])!!}
            </div>
        </div>


        {!! Form::Close() !!}

    </div>
@stop