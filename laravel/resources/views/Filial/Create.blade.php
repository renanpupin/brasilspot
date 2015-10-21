@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarSistema')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Cadastro Filial</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ route('Filial.index') }}">Filial</a></li>
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

    <div id="cadastro" class="grid-m-12 grid-s-12 grid-xs-12">
        {!! Form::Open(['route' => 'Filial.store', 'method' => 'POST']) !!}

            <div class="row">
                <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                    <p class="text-caption">- Campos com (*) são obrigatórios</p>
                </div>

                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="inputEndereceo">Endereço *</label>
                    <input type="text" name="inputEndereceo" id="inputEndereceo">
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="selecionarBairro">Bairro *</label>
                    <select id="selecionarBairro" name="selecionarBairro" required>
                        <option value="-1">Selecione o bairro</option>
                        <option value="1">Bairro 1</option>
                        <option value="2">Bairro 2</option>
                        <option value="3">Bairro 3</option>
                    </select>
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="selecionarEstado">Estado *</label>
                    <select id="selecionarEstado" name="selecionarEstado" required>
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
                    <label for="selecionarCidade">Cidade *</label>
                    <select id="selecionarCidade" name="selecionarCidade" required>
                        <option value="-1">Selecione a cidade</option>
                        <option value="1">Cidade 1</option>
                        <option value="2">Cidade 2</option>
                        <option value="3">Cidade 3</option>
                    </select>
                </div>
                <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                    <label for="inputCoordenadasLat">Coordenadas</label>
                    <p class="input-hint">(Ofereceços o serviço de localização utilizando as coordenadas de latitude e longitude)</p>
                    <div class="row">
                        <div class="grid-m-6">
                            <label for="inputCoordenadasLat" class="input-subhead">Latitude</label><input type="text" name="inputCoordenadasLat" id="inputCoordenadasLat" placeholder="Exemplo: -55.1551">
                        </div>
                        <div class="grid-m-6">
                            <label for="inputCoordenadasLon" class="input-subhead">Longitude</label><input type="text" name="inputCoordenadasLon" id="inputCoordenadasLon" placeholder="Exemplo: -21.123">
                        </div>
                    </div>
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="inputTelefone">Telefone para clientes *</label>
                    <input type="text" name="inputTelefone" id="inputTelefone" class="input-phone">
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="inputWhatsapp">Whatsapp para clientes</label>
                    <input type="text" name="inputWhatsapp" id="inputWhatsapp" class="input-whatsapp">
                </div>
                <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                    <label for="inputIsPrincipal">É a empresa principal? *</label>
                    <p class="input-hint">(Selecione 'SIM' para definir a filial como sendo o endereço principal)</p>
                    <select id="inputIsPrincipal" name="inputIsPrincipal" required>
                        <option value="0">NÃO</option>
                        <option value="1">SIM</option>
                    </select>
                </div>
            </div>
        <div class="row">
            <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 button-field">
                <a href="{{ route('Filial.index') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
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