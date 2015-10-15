@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarSistema')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Cadastro Empresa</h2>
        <p class="text-caption">Por favor, nos informe seus dados e da sua empresa. Os dados abaixo <strong>NÃO</strong> serão divulgados no site.</p>
        <!-- <p class="text-caption">Campos com (*) são obrigatórios</p> -->
        <!-- <p class="text-caption">Suas edições serão aprovadas dentro de 72hs.</p> -->

    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="javascript:void(0)">Empresa</a></li>
                    <li><a href="javascript:void(0)">Cadastrar</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div id="cadastro" class="grid-m-12 grid-s-12">
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
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <p class="text-caption">- Campos com (*) são obrigatórios</p>
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    {!! Form::label('inputEmpreendedor', 'Nome do Empreendedor *',null,['for' => 'inputEmpreendedor']) !!}
                    {!! Form::text('inputEmpreendedor',null,['id' => 'inputEmpreendedor']) !!}
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="inputRazaoSocial">Razão Social</label>
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
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="inputTelefone">Telefone *</label>
                    <input type="email" name="inputTelefone" id="inputTelefone">
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="inputServicos">Serviços</label>
                    <div class="check-inline">
                        <input type="checkbox" name="inputServicos" id="inputServicos1" value="1">Aberto 24 horas
                    </div>
                    <div class="check-inline">
                        <input type="checkbox" name="inputServicos" id="inputServicos2" value="2">Delivery
                    </div>
                    <div class="check-inline">
                        <input type="checkbox" name="inputServicos" id="inputServicos3" value="3">Wi-Fi
                    </div>
                    <div class="check-inline">
                        <input type="checkbox" name="inputServicos" id="inputServicos4" value="3">Ar Condicionado
                    </div>
                    <div class="check-inline">
                        <input type="checkbox" name="inputServicos" id="inputServicos5" value="3">Área para fumante
                    </div>
                </div>
                <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                    <label for="inputNomeFantasia">Nome Fantasia *</label>
                    <input type="email" name="inputNomeFantasia" id="inputNomeFantasia">
                </div>
                <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                    <label for="inputSlogan">Slogan *</label>
                    <input type="email" name="inputSlogan" id="inputSlogan">
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="selecionarTipoEmpreendimento">Tipo do Empreendimento</label>
                    <select id="selecionarTipoEmpreendimento" name="selecionarTipoEmpreendimento" required="">
                        <option value="-1">Selecione o tipo do empreendimento</option>
                        <option value="1">Comércio</option>
                        <option value="3">Serviço</option>
                        <option value="3">Atração</option>
                    </select>
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="selecionarCategoria">Categoria</label>
                    <select id="selecionarCategoria" name="selecionarCategoria" required="">
                        <option value="-1">Selecione a categoria da empresa</option>
                        <option value="1">Promoção</option>
                        <option value="2">Alimentos e Bebidas</option>
                        <option value="3">Animais</option>
                        <option value="4">Arte e cultura</option>
                        <option value="5">Automóveis e veículos</option>
                    </select>
                </div>
                <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                    <label for="inputDescricao">Descrição *</label>
                    <p class="input-hint">(O que você mais quer que as pessoas saibam)</p>
                    <textarea name="inputDescricao" id="inputDescricao"></textarea>
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="inputEndereceo">Endereço *</label>
                    <input type="text" name="inputEndereceo" id="inputEndereceo">
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="selecionarEstado">Estado</label>
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
                    <label for="selecionarCidade">Cidade</label>
                    <select id="selecionarCidade" name="selecionarCidade" required>
                        <option value="-1">Selecione a cidade</option>
                        <option value="1">Cidade 1</option>
                        <option value="2">Cidade 2</option>
                        <option value="3">Cidade 3</option>
                    </select>
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="selecionarBairro">Bairro</label>
                    <select id="selecionarBairro" name="selecionarBairro" required>
                        <option value="-1">Selecione o bairro</option>
                        <option value="1">Bairro 1</option>
                        <option value="2">Bairro 2</option>
                        <option value="3">Bairro 3</option>
                    </select>
                </div>
                <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                    <label for="inputCoordenadasLat">Coordenadas *</label>
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
                <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                    <label for="selecionarTipoCartoesAceitos">Tipos de Cartões Aceitos</label>
                    COLOCAR O SELECT DE CARTÕES
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
                    <!-- <select id="inputAtendeCasa" name="inputAtendeCasa" required>
                        <option value="1">SIM</option>
                        <option value="2">NÃO</option>
                    </select> -->
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="inputWhatsapp">Whatsapp para clientes *</label>
                    <input type="text" name="inputWhatsapp" id="inputWhatsapp" class="input-whatsapp">
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="inputTelefone">Telefone para clientes *</label>
                    <input type="text" name="inputTelefone" id="inputTelefone" class="input-phone">
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="inputLinkFacebook">Link para sua página do Facebook *</label>
                    <input type="text" name="inputLinkFacebook" id="inputLinkFacebook" class="input-facebook" placeholder="Exemplo: https://www.facebook.com/brasilspot">
                </div>
                <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <label for="inputLinkSiteEmpresa">Link para a página da sua empresa *</label>
                    <input type="text" name="inputLinkSiteEmpresa" id="inputLinkSiteEmpresa" class="input-facebook" placeholder="Exemplo: https://www.suaempresa.com.br">
                </div>
                <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                    <label for="inputSelecionarTags">Selecione suas tags *</label>
                    <p class="input-hint">(Empresas do plano básico podem ter no máximo 5 e do plano premium no máximo 15.)</p>
                    <input type="text" name="inputSelecionarTags" id="inputSelecionarTags" class="input-facebook" placeholder="EX: tag1, tag2, tag3">
                </div>
            </div>
            <div class="row">
                <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 button-field">
                    <button id="btnVoltar" class="btn btn-secundary ripple" type="button">
                        <span class="text-content">Voltar</span>
                    </button>
                </div>
                <div class="form-group grid-m-3 grid-s-3 button-field">
                    <button id="btnCadastrar" class="btn btn-primary ripple" type="submit">
                        <span class="text-content">Cadastrar</span>
                    </button>
{{--                    {!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}--}}
                </div>
            </div>

        {!! Form::Close() !!}
    </div>
@stop