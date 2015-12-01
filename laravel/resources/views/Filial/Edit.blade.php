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
        <h2>Editar Filial</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ route('SuasFiliais.index') }}">Suas Filiais</a></li>
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
        {!! Form::Open(['route' => 'SuasFiliais.editar', 'method' => 'POST']) !!}

        <div class="row">
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                <p class="text-caption">- Campos com (*) são obrigatórios</p>
            </div>
            <input type="text" name="idFilial" id="idFilial" value="{{ $filial->id }}" hidden>

            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="endereco">Endereço *</label>
                <input type="text" name="endereco" id="endereco" value="{{ $filial->Endereco->endereco }}">
            </div>
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="bairro">Bairro *</label>
                <input type="text" name="bairro" id="bairro" value="{{ $filial->Endereco->bairro }}">
            </div>
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="cep">Cep </label>
                <input type="text" name="cep" id="cep" value="{{ $filial->Endereco->cep }}">
            </div>
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="cidade">Cidade *</label>
                <input type="text" name="cidade" id="cidade" value="{{ $filial->Endereco->cidade }}">
            </div>
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="estado">Estado *</label>
                <select id="estado" name="estado" required>
                    <option value="-1">Selecione o estado</option>
                    <option value="AC" {{($filial->Endereco->estado == "AC" ? "selected" : "")}}>Acre</option>
                    <option value="AL" {{($filial->Endereco->estado == "AL" ? "selected" : "")}}>Alagoas</option>
                    <option value="AP" {{($filial->Endereco->estado == "AP" ? "selected" : "")}}>Amapá</option>
                    <option value="AM" {{($filial->Endereco->estado == "AM" ? "selected" : "")}}>Amazonas</option>
                    <option value="BA" {{($filial->Endereco->estado == "BA" ? "selected" : "")}}>Bahia</option>
                    <option value="CE" {{($filial->Endereco->estado == "CE" ? "selected" : "")}}>Ceará</option>
                    <option value="DF" {{($filial->Endereco->estado == "DF" ? "selected" : "")}}>Distrito Federal</option>
                    <option value="ES" {{($filial->Endereco->estado == "ES" ? "selected" : "")}}>Espirito Santo</option>
                    <option value="GO" {{($filial->Endereco->estado == "GO" ? "selected" : "")}}>Goiás</option>
                    <option value="MA" {{($filial->Endereco->estado == "MA" ? "selected" : "")}}>Maranhão</option>
                    <option value="MS" {{($filial->Endereco->estado == "MS" ? "selected" : "")}}>Mato Grosso do Sul</option>
                    <option value="MT" {{($filial->Endereco->estado == "MT" ? "selected" : "")}}>Mato Grosso</option>
                    <option value="MG" {{($filial->Endereco->estado == "MG" ? "selected" : "")}}>Minas Gerais</option>
                    <option value="PA" {{($filial->Endereco->estado == "PA" ? "selected" : "")}}>Pará</option>
                    <option value="PB" {{($filial->Endereco->estado == "PB" ? "selected" : "")}}>Paraíba</option>
                    <option value="PR" {{($filial->Endereco->estado == "PR" ? "selected" : "")}}>Paraná</option>
                    <option value="PE" {{($filial->Endereco->estado == "PE" ? "selected" : "")}}>Pernambuco</option>
                    <option value="PI" {{($filial->Endereco->estado == "PI" ? "selected" : "")}}>Piauí</option>
                    <option value="RJ" {{($filial->Endereco->estado == "RJ" ? "selected" : "")}}>Rio de Janeiro</option>
                    <option value="RN" {{($filial->Endereco->estado == "RN" ? "selected" : "")}}>Rio Grande do Norte</option>
                    <option value="RS" {{($filial->Endereco->estado == "RS" ? "selected" : "")}}>Rio Grande do Sul</option>
                    <option value="RO" {{($filial->Endereco->estado == "RO" ? "selected" : "")}}>Rondônia</option>
                    <option value="RR" {{($filial->Endereco->estado == "RR" ? "selected" : "")}}>Roraima</option>
                    <option value="SC" {{($filial->Endereco->estado == "SC" ? "selected" : "")}}>Santa Catarina</option>
                    <option value="SP" {{($filial->Endereco->estado == "SP" ? "selected" : "")}}>São Paulo</option>
                    <option value="SE" {{($filial->Endereco->estado == "SE" ? "selected" : "")}}>Sergipe</option>
                    <option value="TO" {{($filial->Endereco->estado == "TO" ? "selected" : "")}}>Tocantins</option>
                </select>
            </div>

            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                <label for="lat">Coordenadas</label>
                <p class="input-hint">(Ofereceços o serviço de localização utilizando as coordenadas de latitude e longitude)</p>
                <div class="row">
                    <div class="grid-m-6">
                        <label for="lat" class="input-subhead">Latitude</label>
                        <input type="text" name="lat" id="lat" placeholder="Exemplo: -55.1551" value="{{ $filial->Endereco->lat }}">
                    </div>
                    <div class="grid-m-6">
                        <label for="lon" class="input-subhead">Longitude</label>
                        <input type="text" name="lon" id="lon" placeholder="Exemplo: -21.123"  value="{{ $filial->Endereco->lon }}">
                    </div>
                </div>
            </div>
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="telefone">Telefone para clientes *</label>
                <input type="text" name="telefone" id="telefone" class="input-phone" value="{{ $filial->Telefone->numero }}">
            </div>
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="whatsapp">Whatsapp</label>
                <input type="text" name="whatsapp" id="whatsapp" class="input-whatsapp" value="{{ $filial->WhatsApp->numero }}">
            </div>
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                <label for="inputIsPrincipal">É a empresa principal? *</label>
                <p class="input-hint">(Selecione 'SIM' para definir a filial como sendo o endereço principal)</p>
                <select id="isPrincipal" name="isPrincipal" required>
                    <option value="0" {{($filial->isPrincipal == "0" ? "selected" : "")}}>NÃO</option>
                    <option value="1" {{($filial->isPrincipal == "1" ? "selected" : "")}}>SIM</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 button-field">
                <a href="{{ route('SuasFiliais.index') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
                    <span class="text-content">Voltar</span>
                </a>
            </div>
            <div class="form-group grid-m-3 grid-s-3 button-field">
                {!! Form::button('<span class="text-content">Editar</span>',[
                    'id' => 'btnEditar',
                    'type' => 'submit',
                    'class' => 'btn btn-primary ripple'
                    ])!!}
            </div>
        </div>

        {!! Form::Close() !!}
    </div>
@stop