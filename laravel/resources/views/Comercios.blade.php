@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.navbarSite')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>
            <svg version="1.1" id="comercioIcon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 width="18px" height="18px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <g>
                    <path class="path" d="M0,208c0,29.781,20.438,54.594,48,61.75V480H16c-8.813,0-16,7.156-16,16s7.188,16,16,16h480c8.875,0,16-7.156,16-16
                        s-7.125-16-16-16h-32V269.75c27.562-7.156,48-31.969,48-61.75v-16H0V208z M320,272c35.375,0,64-28.656,64-64
                        c0,29.781,20.438,54.594,48,61.75V480H192V272c35.375,0,64-28.656,64-64C256,243.344,284.688,272,320,272z M176,269.75V480H80
                        V269.75c27.563-7.156,48-31.969,48-61.75C128,237.781,148.438,262.594,176,269.75z M448,48H64L0,176h512L448,48z M135.188,83.563
                        l-32,64c-1.438,2.813-4.25,4.438-7.188,4.438c-1.188,0-2.406-0.25-3.563-0.844c-3.938-1.969-5.563-6.781-3.563-10.719l32-64
                        c2-3.938,6.781-5.531,10.719-3.594C135.563,74.813,137.125,79.625,135.188,83.563z M199.188,83.563l-32,64
                        c-1.438,2.813-4.25,4.438-7.188,4.438c-1.188,0-2.406-0.25-3.563-0.844c-3.938-1.969-5.563-6.781-3.563-10.719l32-64
                        c2-3.938,6.813-5.531,10.719-3.594C199.563,74.813,201.125,79.625,199.188,83.563z M264,144c0,4.438-3.562,8-8,8
                        c-4.406,0-8-3.563-8-8V80c0-4.438,3.594-8,8-8c4.438,0,8,3.563,8,8V144z M355.875,151c-1.25,0.688-2.562,1-3.875,1
                        c-2.812,0-5.562-1.5-7-4.156l-35-64c-2.125-3.875-0.688-8.75,3.188-10.844c3.813-2.125,8.75-0.75,10.875,3.156l35,64
                        C361.125,144.031,359.75,148.906,355.875,151z M419.562,151.156C418.438,151.75,417.25,152,416,152
                        c-2.938,0-5.75-1.625-7.125-4.438l-32-64c-2-3.938-0.375-8.75,3.562-10.719c3.875-1.969,8.75-0.375,10.75,3.594l32,64
                        C425.125,144.375,423.562,149.188,419.562,151.156z M136,386.438v-36.875c-4.688-2.812-8-7.688-8-13.562c0-8.844,7.188-16,16-16
                        c8.875,0,16,7.156,16,16c0,5.875-3.281,10.75-8,13.562v36.875c4.719,2.813,8,7.688,8,13.563c0,8.844-7.125,16-16,16
                        c-8.813,0-16-7.156-16-16C128,394.125,131.313,389.25,136,386.438z M64,16c0-8.844,7.188-16,16-16h352c8.875,0,16,7.156,16,16
                        s-7.125,16-16,16H80C71.188,32,64,24.844,64,16z M280.438,357.656l-11.312-11.313l45.25-45.25l11.312,11.313L280.438,357.656z
                         M280.438,402.906l-11.312-11.313l90.5-90.5l11.312,11.313L280.438,402.906z M359.625,346.344l11.312,11.313l-45.25,45.25
                        l-11.312-11.313L359.625,346.344z"/>
                </g>
            </svg>
            Comércios
        </h2>
    </div>

    <div id="filtrar" class="empresa-filtro grid-m-12 grid-s-12 grid-xs-12">
        <form id="formFiltroEmpresas">
            <div class="row">
                <div class="form-group grid-m-5 grid-s-12 grid-xs-12">
                    <label for="pesquisa">Pesquisar</label>
                    <input type="text" id="pesquisa" plceholder="Pesquise uma empresa">
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
                    <a id="btnPesquisarEmpresas" class="btn btn-primary ripple">
                        <span class="text-content">Pesquisar</span>
                    </a>
                </div>
            </div>
        </form>
    </div>

    {{--<div class="content-links grid-m-12 grid-s-12 grid-xs-12">--}}
    {{--<div class="row">--}}
    {{--<div class="grid-m-12 grid-s-12 grid-xs-12">--}}
    {{--<a href="#">Grid</a>--}}
    {{--<a href="#">List</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

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