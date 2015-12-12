@extends('layouts.master')


@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarAdmin')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Meta #{{ $meta->id }}</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ route('Meta.index') }}">Metas</a></li>
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

        {!! Form::model($meta,['route' => ['Meta.update',$meta->id], 'method' => 'PUT']) !!}
        <div class="row">

            <div class="form-group grid-m-6 grid-s-6 grid-xs-12">
                {!! Form::label('nome', 'Nome *',null,['for' => 'nome']) !!}
                {!! Form::text('nome',null,['id' => 'nome']) !!}
            </div>
            <div class="form-group grid-m-6 grid-s-6 grid-xs-12">
                {!! Form::label('numeroAssinaturas', 'Número de Assinaturas *',null,['for' => 'numeroAssinaturas']) !!}
                {!! Form::text('numeroAssinaturas',null,['id' => 'numeroAssinaturas']) !!}
            </div>
            <div class="form-group grid-m-6 grid-s-6 grid-xs-12">
                {!! Form::label('recompensa', 'Recompensa',null,['for' => 'recompensa']) !!}
                {!! Form::text('recompensa',null,['id' => 'recompensa']) !!}
            </div>
            <div class="form-group grid-m-6 grid-s-6 grid-xs-12">
                {!! Form::label('idTipoMeta', 'Tipo da Meta',null,['for' => 'idTipoMeta']) !!}
                {!!Form::select('idTipoMeta', $tiposMeta, null, ['id' => 'idTipoMeta', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 button-field">
                <a href="{{ url('Metas') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
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