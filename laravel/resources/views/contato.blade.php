@extends('layouts.masterSiteSemSidebar')

@section('title', 'Bem vindo!')

@section('navbar')
    @parent
    @include('layouts.navbarSite')
@stop

@section('content')

    <div class="content-title grid-m-10 grid-m-offset-2 grid-s-12 grid-xs-12">
        <h2>Contato</h2>
        <h6>Tire suas duvidas, dê sugestões.</h6>
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

    <div id="contato" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="row">
            {{--<span class="separator"></span>--}}
            <div class="contato-form grid-m-8 grid-m-offset-2 grid-s-8 grid-s-offset-2 grid-xs-12">
                {!! Form::Open(['route' => 'Servico.store', 'method' => 'POST']) !!}
                    <div class="row">
                        <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                            {!! Form::label('nome', 'Nome *',null,['for' => 'nome']) !!}
                            {!! Form::text('nome', null,['id' => 'nome']) !!}
                        </div>
                        <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                            {!! Form::label('email', 'Email *',null,['for' => 'email']) !!}
                            {!! Form::text('email', null,['id' => 'email']) !!}
                        </div>
                        <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                            {!! Form::label('mensagem', 'Mensagem *',null,['for' => 'mensagem']) !!}
                            {!! Form::textarea('mensagem', null,['id' => 'mensagem']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group grid-m-6 grid-m-offset-6 grid-s-12 grid-xs-12 button-field">
                            {!! Form::button('<span class="text-content">Enviar</span>',[
                                'id' => 'btnEnviar',
                                'type' => 'submit',
                                'class' => 'btn btn-primary ripple'
                                ])!!}
                        </div>
                    </div>
                {!! Form::Close() !!}
            </div>
        </div>
    </div>

@stop