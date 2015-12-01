@extends('layouts.master')


@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarComerciante')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Filial #{{ $filial->id }}</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ route('Filial.index') }}">Suas Filiais</a></li>
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
                <p class="text-caption">- Campos com (*) são obrigatórios</p>
            </div>

            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="endereco">Endereço *</label>
                <p class="field-disabled">{{ $filial->Endereco->endereco }}</p>
            </div>
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="bairro">Bairro *</label>
                <p class="field-disabled">{{ $filial->Endereco->bairro }}</p>
            </div>
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="cep">Cep </label>
                <p class="field-disabled">{{ $filial->Endereco->cep }}</p>
            </div>
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="cidade">Cidade *</label>
                <p class="field-disabled">{{ $filial->Endereco->cidade }}</p>
            </div>
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="estado">Estado *</label>
                <p class="field-disabled">{{ $filial->Endereco->estado }}</p>
            </div>

            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                <label for="lat">Coordenadas</label>
                <p class="input-hint">(Ofereceços o serviço de localização utilizando as coordenadas de latitude e longitude)</p>
                <div class="row">
                    <div class="grid-m-6">
                        <label for="lat" class="input-subhead">Latitude</label>
                        <p class="field-disabled">{{ $filial->Endereco->lat }}</p>
                    </div>
                    <div class="grid-m-6">
                        <label for="lon" class="input-subhead">Longitude</label>
                        <p class="field-disabled">{{ $filial->Endereco->lon }}</p>
                    </div>
                </div>
            </div>
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="telefone">Telefone para clientes *</label>
                <p class="field-disabled">{{ $filial->Telefone->numero }}</p>
            </div>
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="whatsapp">Whatsapp</label>
                <p class="field-disabled">{{ $filial->WhatsApp->numero }}</p>
            </div>
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                <label for="inputIsPrincipal">É a empresa principal? *</label>
                <p class="field-disabled">{{($filial->isPrincipal == "0" ? "NÃO" : "SIM")}}</p>
            </div>
        </div>

        <div class="row">
            <div class="form-group grid-m-3 grid-m-offset-9 grid-s-3 grid-s-offset-9 button-field">
                <a href="{{ route('SuasFiliais.index') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
                    <span class="text-content">Voltar</span>
                </a>
            </div>
        </div>


    </div>
@stop