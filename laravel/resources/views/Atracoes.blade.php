@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarSite')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>
            <svg version="1.1" id="atracoesIcon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 width="18px" height="18px" viewBox="0 0 473.194 473.194" style="enable-background:new 0 0 473.194 473.194;" xml:space="preserve">
                <g>
                    <path d="M464.653,167.757c-0.824-3.273-2.996-6.037-5.969-7.633c-2.965-1.586-6.47-1.855-9.65-0.738
                        c-27.88,9.795-70.896,16.098-119.276,16.098c-11.762,0-23.098-0.449-34.089-1.156c-5.683,25.676-14.764,49.252-26.363,70.016
                        c0.564-0.023,1.103-0.115,1.672-0.115c15.034,0,27.218-1.254,27.218,8.873c0,10.127-12.185,27.803-27.218,27.803
                        c-8.757,0-16.467-2.834-21.442-7.162c-15.025,18.654-32.578,33.363-51.909,43.09c21.795,73.361,72.751,124.824,132.131,124.824
                        c79.219,0,143.437-91.584,143.437-204.559C473.194,212.728,470.151,189.408,464.653,167.757z M386.92,381.927
                        c-0.254,1.078-1.056,1.957-2.11,2.303c-1.056,0.353-2.218,0.131-3.066-0.586c-11.174-9.389-30.182-15.627-51.985-15.627
                        c-21.805,0-40.813,6.238-51.986,15.627c-0.849,0.709-2.012,0.932-3.066,0.586c-1.055-0.354-1.856-1.225-2.11-2.303
                        c-0.925-3.936-1.494-7.994-1.494-12.215c0-32.395,26.263-58.656,58.657-58.656c32.394,0,58.655,26.262,58.655,58.656
                        C388.413,373.933,387.844,377.992,386.92,381.927z M388.537,280.904c-15.034,0-27.218-17.676-27.218-27.803
                        c0-10.127,12.185-8.873,27.218-8.873c15.033,0,27.218,8.211,27.218,18.338C415.754,272.693,403.57,280.904,388.537,280.904z"/>
                    <path d="M286.874,109.925c0-24.367-3.043-47.688-8.541-69.338c-0.824-3.273-2.996-6.039-5.969-7.633
                        c-1.756-0.939-3.705-1.416-5.669-1.416c-1.341,0-2.688,0.221-3.981,0.678c-27.88,9.795-70.895,16.096-119.276,16.096
                        c-48.382,0-91.397-6.301-119.277-16.096c-1.286-0.457-2.626-0.678-3.966-0.678c-1.963,0-3.921,0.482-5.685,1.424
                        c-2.965,1.594-5.144,4.359-5.969,7.625C3.043,62.238,0,85.558,0,109.925c0,112.977,64.217,204.559,143.438,204.559
                        C222.657,314.484,286.874,222.902,286.874,109.925z M57.439,135.349c0-10.129,12.185-18.338,27.219-18.338
                        c15.033,0,27.218,17.674,27.218,27.803c0,10.127-12.185,8.873-27.218,8.873C69.624,153.687,57.439,145.476,57.439,135.349z
                         M143.438,275.812c-32.395,0-58.656-26.262-58.656-58.654c0-4.221,0.569-8.281,1.493-12.217c0.254-1.076,1.056-1.947,2.11-2.303
                        c1.056-0.346,2.218-0.123,3.066,0.586c11.174,9.389,30.182,15.627,51.986,15.627c21.804,0,40.812-6.238,51.985-15.627
                        c0.849-0.717,2.011-0.939,3.066-0.586c1.055,0.348,1.856,1.227,2.11,2.303c0.924,3.936,1.494,7.996,1.494,12.217
                        C202.093,249.55,175.831,275.812,143.438,275.812z M174.998,144.814c0-10.129,12.185-27.803,27.219-27.803
                        c15.033,0,27.218,8.209,27.218,18.338c0,10.127-12.185,18.338-27.218,18.338C187.183,153.687,174.998,154.941,174.998,144.814z"/>
                </g>
            </svg>
            Atrações
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