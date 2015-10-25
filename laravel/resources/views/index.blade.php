@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarSite')
@stop

@section('content')
    <div id="filtrar" class="empresa-filtro grid-m-12 grid-s-12 grid-xs-12">
        <form id="formFiltroEmpresas">
            <div class="row">
                <div class="filtroEmpreendimento form-group grid-m-5 grid-s-12 grid-xs-12" style="margin-top: 0px;">
                    <label for="selecionarTipoEmpreendimento" style="text-align: left;">Filtro</label>
                    <div class="row" style="margin-top: 5px">
                        <div class="grid-m-4 grid-s-4 grid-xs-4">
                            <a href="javascript:void(0)">
                                <span class="filtroComercio filtroTipoEmpreendimento selecionado" >
                                    <svg>
                                        <use xlink:href="{!! asset('assets/img/comercio.svg#comercioIcon') !!}"></use>
                                    </svg>
                                    Comércio
                                </span>
                            </a>
                        </div>
                        <div class="grid-m-4 grid-s-4 grid-xs-4">
                            <a href="javascript:void(0)">
                                <span class="filtroServico filtroTipoEmpreendimento">
                                    <svg>
                                        <use xlink:href="{!! asset('assets/img/servicos.svg#servicosIcon') !!}"></use>
                                    </svg>
                                    Serviço
                                </span>
                            </a>
                        </div>
                        <div class="grid-m-4 grid-s-4 grid-xs-4">
                            <a href="javascript:void(0)">
                                <span class="filtroAtracao filtroTipoEmpreendimento">
                                    <svg>
                                        <use xlink:href="{!! asset('assets/img/atracoes.svg#atracoesIcon') !!}"></use>
                                    </svg>
                                    Atração
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="form-group grid-m-4 grid-s-12 grid-xs-12">
                    <label for="selecionarCategoria">Categoria</label>
                    <select id="selecionarCategoria" name="selecionarCategoria" required="">
                        <option value="-1">Selecione a categoria</option>
                        <option value="1">Promoção</option>
                        <option value="2">Alimentos e Bebidas</option>
                        <option value="3">Animais</option>
                        <option value="4">Arte e cultura</option>
                        <option value="5">Automóveis e veículos</option>
                    </select>
                </div>
                <div class="form-group grid-m-3 button-field" style="margin-top: 12px;">
                    <a id="btnFiltrarEmpresas" class="btn btn-primary ripple">
                        <span class="text-content">Filtrar</span>
                    </a>
                </div>
            </div>
        </form>
    </div>

    <div class="content-empresas grid-m-12 grid-s-12 grid-xs-12">
        <div class="row">
            <div class="grid-m-6  grid-s-12 grid-xs-12">
                <div class="empresa-item ">
                    <div class="row">
                        <div class="empresa-logo grid-m-3 grid-s-4 grid-xs-4">
                            <img src="assets/img/logo.00_png_srb">
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
            <div class="grid-m-6 grid-s-12 grid-xs-12">
                <div class="empresa-item ">
                    <div class="row">
                        <div class="empresa-logo grid-m-3 grid-s-4 grid-xs-4">
                            <img src="assets/img/logo.00_png_srb">
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
                            <img src="assets/img/logo.00_png_srb">
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
                            <img src="assets/img/logo.00_png_srb">
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
                            <img src="assets/img/logo.00_png_srb">
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
                            <img src="assets/img/logo.00_png_srb">
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