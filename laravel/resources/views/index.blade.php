@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarSite')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>
            Destaques Locais
        </h2>
    </div>

    <div id="filtrar" class="empresa-filtro grid-m-12 grid-s-12 grid-xs-12">
        <form id="formFiltroEmpresas">
            {{--<div class="row">--}}
                {{--<div class="filtroEmpreendimento form-group grid-m-5 grid-s-12 grid-xs-12" style="margin-top: 0px;">--}}
                    {{--<label for="selecionarTipoEmpreendimento" style="text-align: left;">Filtros</label>--}}
                    {{--<div class="row" style="margin-top: 5px">--}}
                        {{--<div class="grid-m-4 grid-s-4 grid-xs-4">--}}
                            {{--<a href="javascript:void(0)">--}}
                        {{--<span class="filtroComercio filtroTipoEmpreendimento selecionado" >--}}
                        {{--<svg>--}}
                            {{--<use xlink:href="{!! asset('assets/img/comercio.svg#comercioIcon') !!}"></use>--}}
                        {{--</svg>--}}
                        {{--Comércio--}}
                        {{--</span>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        {{--<div class="grid-m-4 grid-s-4 grid-xs-4">--}}
                            {{--<a href="javascript:void(0)">--}}
                        {{--<span class="filtroServico filtroTipoEmpreendimento">--}}
                        {{--<svg>--}}
                            {{--<use xlink:href="{!! asset('assets/img/servicos.svg#servicosIcon') !!}"></use>--}}
                        {{--</svg>--}}
                        {{--Serviço--}}
                        {{--</span>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        {{--<div class="grid-m-4 grid-s-4 grid-xs-4">--}}
                            {{--<a href="javascript:void(0)">--}}
                        {{--<span class="filtroAtracao filtroTipoEmpreendimento">--}}
                        {{--<svg>--}}
                            {{--<use xlink:href="{!! asset('assets/img/atracoes.svg#atracoesIcon') !!}"></use>--}}
                        {{--</svg>--}}
                        {{--Atração--}}
                        {{--</span>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            <form id="formBuscaEmpresas">
                <div class="row">
                    <div class="form-group grid-m-4 grid-s-12 grid-xs-12">
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
                    <div class="form-group grid-m-4 grid-s-12 grid-xs-12">
                        <label for="selecionarCidade">Cidade</label>
                        <select id="selecionarCidade" name="selecionarCidade" required>
                            <option value="-1">Selecione a cidade</option>
                            <option value="1">Cidade 1</option>
                            <option value="2">Cidade 2</option>
                            <option value="3">Cidade 3</option>
                        </select>
                    </div>
                    <div class="form-group grid-m-4 grid-s-12 grid-xs-12">
                        <label for="selecionarBairro">Bairro</label>
                        <select id="selecionarBairro" name="selecionarBairro" required>
                            <option value="-1">Selecione o bairro</option>
                            <option value="1">Bairro 1</option>
                            <option value="2">Bairro 2</option>
                            <option value="3">Bairro 3</option>
                        </select>
                    </div>
                </div>
                {{--<div class="row">--}}
                    {{--<div class="form-group grid-m-9 grid-s-8 grid-xs-12">--}}
                        {{--<label for="pesquisa">Pesquisar</label>--}}
                        {{--<input type="text" id="pesquisa" plceholder="Pesquise uma empresa">--}}
                    {{--</div>--}}
                    {{--<div class="form-group grid-m-3 grid-s-4 grid-xs-12 button-field" style="margin-top: 10px;">--}}
                        {{--<a href="{{ url('Empresas' )}}" id="btnPesquisarEmpresas" class="btn btn-primary ripple">--}}
                            {{--<span class="text-content">Pesquisar</span>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </form>
        </form>
    </div>

    <div class="content-empresas grid-m-12 grid-s-12 grid-xs-12">
        <div class="row">
            <div class="grid-m-6  grid-s-12 grid-xs-12">
                <div class="empresa-item ">
                    <div class="row">
                        <div class="empresa-logo grid-m-3 grid-s-4 grid-xs-4">
                            <img src="assets/img/placeholder-company.png">
                        </div>
                        <div class="empresa-nome grid-m-9 grid-s-8 grid-xs-8">
                            <div class="text-title">
                                Nome da Empresa 1
                            </div>
                            <div class="text-caption">
                                Descrição da Empresa 1
                            </div>
                            <div class="empresa-feature">
                                <span class="empresa-feature-item">
                                    <i class="material-icons">phone</i>
                                    Telefone
                                </span>
                                <span class="empresa-feature-item">
                                    <i class="material-icons">location_on</i>
                                    Local
                                </span>
                                <span class="empresa-feature-item">
                                    <i class="material-icons">credit_card</i>
                                    Cartão
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="grid-m-6 grid-s-6 grid-xs-6">
                            <div class="empresa-categoria text-caption">
                                <i class="material-icons">toys</i>
                                <!-- <i class="material-icons">filter_vintage</i> -->
                                Gastronomia
                            </div>
                        </div>

                        <div class="grid-m-6 grid-s-6 grid-xs-6 button-field">
                            <a href="{{ url('Empresas/1') }}" id="btnView" class="btn round-btn ripple" title="Ver Empresa">
                                <i class="material-icons">arrow_forward</i>
                                <span class="text-content">Encontre</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="grid-m-6 grid-s-12 grid-xs-12">
                <div class="empresa-item ">
                    <div class="row">
                        <div class="empresa-logo grid-m-3 grid-s-4 grid-xs-4">
                            <img src="assets/img/placeholder-company.png">
                        </div>
                        <div class="empresa-nome grid-m-9 grid-s-8 grid-xs-8">
                            <div class="text-title">
                                Nome da Empresa 1
                            </div>
                            <div class="text-caption">
                                Descrição da Empresa 1
                            </div>
                            <div class="empresa-feature">
                                <span class="empresa-feature-item">
                                    <i class="material-icons">phone</i>
                                    Telefone
                                </span>
                                <span class="empresa-feature-item">
                                    <i class="material-icons">location_on</i>
                                    Local
                                </span>
                                <span class="empresa-feature-item">
                                    <i class="material-icons">credit_card</i>
                                    Cartão
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="grid-m-6 grid-s-6 grid-xs-6">
                            <div class="empresa-categoria text-caption">
                                <i class="material-icons">toys</i>
                                <!-- <i class="material-icons">filter_vintage</i> -->
                                Gastronomia
                            </div>
                        </div>

                        <div class="grid-m-6 grid-s-6 grid-xs-6 button-field">
                            <button id="btnView" class="btn round-btn ripple" type="button" title="Ver Empresa">
                                <i class="material-icons">arrow_forward</i>
                                <span class="text-content">Encontre</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="grid-m-6  grid-s-12 grid-xs-12">
                <div class="empresa-item ">
                    <div class="row">
                        <div class="empresa-logo grid-m-3 grid-s-4 grid-xs-4">
                            <img src="assets/img/placeholder-company.png">
                        </div>
                        <div class="empresa-nome grid-m-9 grid-s-8 grid-xs-8">
                            <div class="text-title">
                                Nome da Empresa 1
                            </div>
                            <div class="text-caption">
                                Descrição da Empresa 1
                            </div>
                            <div class="empresa-feature">
                                <span class="empresa-feature-item">
                                    <i class="material-icons">phone</i>
                                    Telefone
                                </span>
                                <span class="empresa-feature-item">
                                    <i class="material-icons">location_on</i>
                                    Local
                                </span>
                                <span class="empresa-feature-item">
                                    <i class="material-icons">credit_card</i>
                                    Cartão
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="grid-m-6 grid-s-6 grid-xs-6">
                            <div class="empresa-categoria text-caption">
                                <i class="material-icons">toys</i>
                                <!-- <i class="material-icons">filter_vintage</i> -->
                                Gastronomia
                            </div>
                        </div>

                        <div class="grid-m-6 grid-s-6 grid-xs-6 button-field">
                            <button id="btnView" class="btn round-btn ripple" type="button" title="Ver Empresa">
                                <i class="material-icons">arrow_forward</i>
                                <span class="text-content">Encontre</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="grid-m-6  grid-s-12 grid-xs-12">
                <div class="empresa-item ">
                    <div class="row">
                        <div class="empresa-logo grid-m-3 grid-s-4 grid-xs-4">
                            <img src="assets/img/placeholder-company.png">
                        </div>
                        <div class="empresa-nome grid-m-9 grid-s-8 grid-xs-8">
                            <div class="text-title">
                                Nome da Empresa 1
                            </div>
                            <div class="text-caption">
                                Descrição da Empresa 1
                            </div>
                            <div class="empresa-feature">
                                <span class="empresa-feature-item">
                                    <i class="material-icons">phone</i>
                                    Telefone
                                </span>
                                <span class="empresa-feature-item">
                                    <i class="material-icons">location_on</i>
                                    Local
                                </span>
                                <span class="empresa-feature-item">
                                    <i class="material-icons">credit_card</i>
                                    Cartão
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="grid-m-6 grid-s-6 grid-xs-6">
                            <div class="empresa-categoria text-caption">
                                <i class="material-icons">toys</i>
                                <!-- <i class="material-icons">filter_vintage</i> -->
                                Gastronomia
                            </div>
                        </div>

                        <div class="grid-m-6 grid-s-6 grid-xs-6 button-field">
                            <button id="btnView" class="btn round-btn ripple" type="button" title="Ver Empresa">
                                <i class="material-icons">arrow_forward</i>
                                <span class="text-content">Encontre</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="grid-m-6  grid-s-12 grid-xs-12">
                <div class="empresa-item ">
                    <div class="row">
                        <div class="empresa-logo grid-m-3 grid-s-4 grid-xs-4">
                            <img src="assets/img/placeholder-company.png">
                        </div>
                        <div class="empresa-nome grid-m-9 grid-s-8 grid-xs-8">
                            <div class="text-title">
                                Nome da Empresa 1
                            </div>
                            <div class="text-caption">
                                Descrição da Empresa 1
                            </div>
                            <div class="empresa-feature">
                                <span class="empresa-feature-item">
                                    <i class="material-icons">phone</i>
                                    Telefone
                                </span>
                                <span class="empresa-feature-item">
                                    <i class="material-icons">location_on</i>
                                    Local
                                </span>
                                <span class="empresa-feature-item">
                                    <i class="material-icons">credit_card</i>
                                    Cartão
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="grid-m-6 grid-s-6 grid-xs-6">
                            <div class="empresa-categoria text-caption">
                                <i class="material-icons">toys</i>
                                <!-- <i class="material-icons">filter_vintage</i> -->
                                Gastronomia
                            </div>
                        </div>

                        <div class="grid-m-6 grid-s-6 grid-xs-6 button-field">
                            <button id="btnView" class="btn round-btn ripple" type="button" title="Ver Empresa">
                                <i class="material-icons">arrow_forward</i>
                                <span class="text-content">Encontre</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="grid-m-6  grid-s-12 grid-xs-12">
                <div class="empresa-item ">
                    <div class="row">
                        <div class="empresa-logo grid-m-3 grid-s-4 grid-xs-4">
                            <img src="assets/img/placeholder-company.png">
                        </div>
                        <div class="empresa-nome grid-m-9 grid-s-8 grid-xs-8">
                            <div class="text-title">
                                Nome da Empresa 1
                            </div>
                            <div class="text-caption">
                                Descrição da Empresa 1
                            </div>
                            <div class="empresa-feature">
                                <span class="empresa-feature-item">
                                    <i class="material-icons">phone</i>
                                    Telefone
                                </span>
                                <span class="empresa-feature-item">
                                    <i class="material-icons">location_on</i>
                                    Local
                                </span>
                                <span class="empresa-feature-item">
                                    <i class="material-icons">credit_card</i>
                                    Cartão
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="grid-m-6 grid-s-6 grid-xs-6">
                            <div class="empresa-categoria text-caption">
                                <i class="material-icons">toys</i>
                                <!-- <i class="material-icons">filter_vintage</i> -->
                                Gastronomia
                            </div>
                        </div>

                        <div class="grid-m-6 grid-s-6 grid-xs-6 button-field">
                            <button id="btnView" class="btn round-btn ripple" type="button" title="Ver Empresa">
                                <i class="material-icons">arrow_forward</i>
                                <span class="text-content">Encontre</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="carregarMaisEmpresas" class="grid-m-12 grid-s-12 grid-xs-12" title="Carregar mais empresas">
        <a href="#" class="btn round-btn">
            <i class="material-icons">more_horiz</i>
        </a>
    </div>

    {{--<div id="tags" class="empresa-tags grid-m-12 grid-s-12 grid-xs-12">--}}
    {{--<h4>Tags</h4>--}}
    {{--<a href="javascript:void(0)"><span>TaTaggTag1</span></a>--}}
    {{--<a href="javascript:void(0)"><span>Tag2Tag</span></a>--}}
    {{--<a href="javascript:void(0)"><span>Tag2Tag</span></a>--}}
    {{--<a href="javascript:void(0)"><span>Tag2Tag</span></a>--}}
    {{--<a href="javascript:void(0)"><span>Tag2Tag</span></a>--}}
    {{--<a href="javascript:void(0)"><span>Tag2Tag</span></a>--}}
    {{--<a href="javascript:void(0)"><span>Tag3</span></a>--}}
    {{--</div>--}}
@stop