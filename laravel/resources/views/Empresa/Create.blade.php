@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarSistema')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Cadastro Empresa</h2>
        {{--<p class="text-caption">Por favor, nos informe seus dados e da sua empresa. Os dados abaixo <strong>NÃO</strong> serão divulgados no site.</p>--}}
        <!-- <p class="text-caption">Campos com (*) são obrigatórios</p> -->
        <!-- <p class="text-caption">Suas edições serão aprovadas dentro de 72hs.</p> -->

    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ route('Empresa.index') }}">Empresa</a></li>
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
        {!! Form::Open(['route' => 'Empresa.store', 'method' => 'POST']) !!}

            <div class="row">
                <div id="galeria-empresa" class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <div class="row">
                        <div class="galeria-feature">
                            <img src="{!! asset('assets/img/placeholder-company.png') !!}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="galeria-thumb">
                            <div class="thumb-item grid-xs-4 grid-s-4 grid-m-4 grid-l-4">
                                <img src="{!! asset('assets/img/placeholder-company.png') !!}">
                            </div>
                            <div class="thumb-item grid-xs-4 grid-s-4 grid-m-4 grid-l-4">
                                <img src="{!! asset('assets/img/placeholder-company.png') !!}">
                            </div>
                            <div class="thumb-item grid-xs-4 grid-s-4 grid-m-4 grid-l-4">
                                <img src="{!! asset('assets/img/placeholder-company.png') !!}">
                            </div>
                        </div>
                    </div>
                </div>
                {{--<div class="form-group grid-m-6 grid-s-12 grid-xs-12">--}}
                    {{--<p class="text-caption">- Campos com (*) são obrigatórios</p>--}}
                {{--</div>--}}

                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <span class="text-display-1">
                        <i class="material-icons" style="font-size: inherit;">lock_outline</i>
                        Informações Privadas
                    </span>
                    <p class="text-caption">- As informações inseridas abaixo não serão exibidas para o público</p>
                </div>

                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    {!! Form::label('inputEmpreendedor', 'Nome do Empreendedor *',null,['for' => 'inputEmpreendedor']) !!}
                    {!! Form::text('inputEmpreendedor',null,['id' => 'inputEmpreendedor']) !!}
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="inputRazaoSocial">Razão Social *</label>
                    <input type="text" name="inputRazaoSocial" id="inputRazaoSocial">
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="inputCpfCnpj">CPF ou CNPJ *</label>
                    <input type="text" name="inputCpfCnpj" id="inputCpfCnpj">
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="inputEmail">Email *</label>
                    <input type="email" name="inputEmail" id="inputEmail">
                </div>

                <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                    <span class="text-display-1">
                        <i class="material-icons" style="font-size: inherit;">lock_open</i>
                        Informações Públicas
                    </span>
                    <p class="text-caption">- As informações inseridas abaixo poderão ser vistas por qualquer um</p>
                </div>

                {{--<div class="form-group grid-m-6 grid-s-12 grid-xs-12">--}}
                    {{--<label for="inputServicos">Serviços</label>--}}
                    {{--<div class="check-inline">--}}
                        {{--<input type="checkbox" name="inputServicos" id="inputServicos1" value="1">Aberto 24 horas--}}
                    {{--</div>--}}
                    {{--<div class="check-inline">--}}
                        {{--<input type="checkbox" name="inputServicos" id="inputServicos2" value="2">Delivery--}}
                    {{--</div>--}}
                    {{--<div class="check-inline">--}}
                        {{--<input type="checkbox" name="inputServicos" id="inputServicos3" value="3">Wi-Fi--}}
                    {{--</div>--}}
                    {{--<div class="check-inline">--}}
                        {{--<input type="checkbox" name="inputServicos" id="inputServicos4" value="3">Ar Condicionado--}}
                    {{--</div>--}}
                    {{--<div class="check-inline">--}}
                        {{--<input type="checkbox" name="inputServicos" id="inputServicos5" value="3">Área para fumante--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                    <label for="inputNomeFantasia">Nome Fantasia *</label>
                    <input type="email" name="inputNomeFantasia" id="inputNomeFantasia">
                </div>
                <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                    <label for="inputSlogan">Slogan *</label>
                    <input type="email" name="inputSlogan" id="inputSlogan">
                </div>
                <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                    <label for="inputDescricao">Descrição *</label>
                    <p class="input-hint">(O que você mais quer que as pessoas saibam)</p>
                    <textarea name="inputDescricao" id="inputDescricao"></textarea>
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="selecionarTipoEmpreendimento">Tipo do Empreendimento *</label>
                    <select id="selecionarTipoEmpreendimento" name="selecionarTipoEmpreendimento" required="">
                        <option value="-1">Selecione o tipo do empreendimento</option>
                        <option value="1">Comércio</option>
                        <option value="3">Serviço</option>
                        <option value="3">Atração</option>
                    </select>
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="selecionarCategoria">Categoria *</label>
                    <select id="selecionarCategoria" name="selecionarCategoria" required="">
                        <option value="-1">Selecione a categoria da empresa</option>
                        <option value="1">Promoção</option>
                        <option value="2">Alimentos e Bebidas</option>
                        <option value="3">Animais</option>
                        <option value="4">Arte e cultura</option>
                        <option value="5">Automóveis e veículos</option>
                    </select>
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="inputHorarioFuncionamento">Horário de Funcionamento *</label>
                    <input type="text" name="inputHorarioFuncionamento" id="inputHorarioFuncionamento">
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="selecionarCartoesAceitos">Cartões Aceitos</label>
                    <select id="selecionarCartoesAceitos" name="selecionarCartoesAceitos" required>
                        <option value="-1">Selecione os cartões aceitos</option>
                        <option value="1">Débito</option>
                        <option value="2">Crédito</option>
                        <option value="3">Débito e Crédito</option>
                    </select>
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="inputTipoCartoesAceitos">Tipos de Cartões Aceitos</label>
                    {{--<p class="input-hint">(Desconsidere caso sua empresa não aceite cartões)</p>--}}
                    <div class="check-inline">
                        <input type="checkbox" name="inputTipoCartoesAceitos" id="inputTipoCartoesAceitos1" value="VISA">VISA
                    </div>
                    <div class="check-inline">
                        <input type="checkbox" name="inputTipoCartoesAceitos" id="inputTipoCartoesAceitos2" value="MASTER">MASTER
                    </div>
                    <div class="check-inline">
                        <input type="checkbox" name="inputTipoCartoesAceitos" id="inputTipoCartoesAceitos3" value="AMEX">AMEX
                    </div>
                    <div class="check-inline">
                        <input type="checkbox" name="inputTipoCartoesAceitos" id="inputTipoCartoesAceitos4" value="ELO">ELO
                    </div>
                    <div class="check-inline">
                        <input type="checkbox" name="inputTipoCartoesAceitos" id="inputTipoCartoesAceitos5" value="ELO">DINERS CLUB
                    </div>
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="inputAtendeCasa">Sua empresa atende em casa *</label>
                    <p class="input-hint">(Entrega de comida, presta serviços, busca de animais em casa para tosa, entre outros.)</p>
                    <label>
                        <input type="radio" name="inputAtendeCasa" id="inputAtendeCasa1" value="SIM" checked>
                        SIM
                    </label>
                    <label>
                        <input type="radio" name="inputAtendeCasa" id="inputAtendeCasa2" value="NÃO">
                        NÃO
                    </label>
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="inputLinkFacebook">Link para sua página do Facebook *</label>
                    <input type="text" name="inputLinkFacebook" id="inputLinkFacebook" class="input-facebook" placeholder="Exemplo: https://www.facebook.com/brasilspot">
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="inputLinkSiteEmpresa">Link para o site da empresa *</label>
                    <input type="text" name="inputLinkSiteEmpresa" id="inputLinkSiteEmpresa" class="input-facebook" placeholder="Exemplo: https://www.suaempresa.com.br">
                </div>
                <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                    <label for="inputSelecionarTags">Informe suas tags *</label>
                    <p class="input-hint">(Empresas do plano básico podem ter no máximo 5 e do plano premium no máximo 15.)</p>
                    <p class="input-hint">(As tags facilitam sua empresa ser encontrada nos mecanismos de busca)</p>
                    <p class="input-hint">(Separe as tags por vírgula)</p>
                    <input type="text" name="inputSelecionarTags" id="inputSelecionarTags" class="input-facebook" placeholder="EX: tag1, tag2, tag3">
                </div>
            </div>
        <div class="row">
            <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 grid-xs-12 button-field">
                <a href="{{ route('Empresa.index') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
                    <span class="text-content">Voltar</span>
                </a>
            </div>
            <div class="form-group grid-m-3 grid-s-3 grid-xs-12 button-field">
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