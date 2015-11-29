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
        <h2>Cadastro Endereço</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ route('Endereco.index') }}">Endereço</a></li>
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

        {!! Form::Open(['route' => 'Endereco.store', 'method' => 'POST']) !!}
        <div class="row">
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                {!! Form::label('endereco', 'Endereço *',null,['for' => 'endereco']) !!}
                {!! Form::text('endereco',null,['id' => 'endereco']) !!}
            </div>

            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                {!! Form::label('bairro', 'Bairro *',null,['for' => 'bairro']) !!}
                {!! Form::text('bairro',null,['id' => 'bairro']) !!}
            </div>

            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                {!! Form::label('cidade', 'Cidade *',null,['for' => 'cidade']) !!}
                {!! Form::text('cidade',null,['id' => 'cidade']) !!}
            </div>

            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="estado">Estado *</label>
                <select id="estado" name="estado" required>
                    <option value="-1">Selecione o estado</option>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espirito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>
            </div>

            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                {!! Form::label('cep', 'Cep *',null,['for' => 'cep']) !!}
                {!! Form::text('cep',null,['id' => 'cep']) !!}
            </div>

            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                {!! Form::label('lat', 'Latitude ',null,['for' => 'lat']) !!}
                {!! Form::text('lat',null,['id' => 'lat']) !!}
            </div>

            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                {!! Form::label('lon', 'Longitude ',null,['for' => 'lon']) !!}
                {!! Form::text('lon',null,['id' => 'lon']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 button-field">
                <a href="{{ route('Endereco.index') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
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
@stop