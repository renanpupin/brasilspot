@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.navbarSite')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>
            <svg version="1.1" id="servicosIcon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 width="18px" height="18px" viewBox="0 0 231.233 231.233" style="enable-background:new 0 0 231.233 231.233;" xml:space="preserve">
<path d="M230.505,102.78c-0.365-3.25-4.156-5.695-7.434-5.695c-10.594,0-19.996-6.218-23.939-15.842
	c-4.025-9.855-1.428-21.346,6.465-28.587c2.486-2.273,2.789-6.079,0.705-8.721c-5.424-6.886-11.586-13.107-18.316-18.498
	c-2.633-2.112-6.502-1.818-8.787,0.711c-6.891,7.632-19.27,10.468-28.836,6.477c-9.951-4.187-16.232-14.274-15.615-25.101
	c0.203-3.403-2.285-6.36-5.676-6.755c-8.637-1-17.35-1.029-26.012-0.068c-3.348,0.37-5.834,3.257-5.723,6.617
	c0.375,10.721-5.977,20.63-15.832,24.667c-9.451,3.861-21.744,1.046-28.621-6.519c-2.273-2.492-6.074-2.798-8.725-0.731
	c-6.928,5.437-13.229,11.662-18.703,18.492c-2.133,2.655-1.818,6.503,0.689,8.784c8.049,7.289,10.644,18.879,6.465,28.849
	c-3.99,9.505-13.859,15.628-25.156,15.628c-3.666-0.118-6.275,2.345-6.68,5.679c-1.016,8.683-1.027,17.535-0.049,26.289
	c0.365,3.264,4.268,5.688,7.582,5.688c10.07-0.256,19.732,5.974,23.791,15.841c4.039,9.855,1.439,21.341-6.467,28.592
	c-2.473,2.273-2.789,6.07-0.701,8.709c5.369,6.843,11.537,13.068,18.287,18.505c2.65,2.134,6.504,1.835,8.801-0.697
	c6.918-7.65,19.295-10.481,28.822-6.482c9.98,4.176,16.258,14.262,15.645,25.092c-0.201,3.403,2.293,6.369,5.672,6.755
	c4.42,0.517,8.863,0.773,13.32,0.773c4.23,0,8.461-0.231,12.692-0.702c3.352-0.37,5.834-3.26,5.721-6.621
	c-0.387-10.716,5.979-20.626,15.822-24.655c9.514-3.886,21.752-1.042,28.633,6.512c2.285,2.487,6.063,2.789,8.725,0.73
	c6.916-5.423,13.205-11.645,18.703-18.493c2.135-2.65,1.832-6.503-0.689-8.788c-8.047-7.284-10.656-18.879-6.477-28.839
	c3.928-9.377,13.43-15.673,23.65-15.673l1.43,0.038c3.318,0.269,6.367-2.286,6.768-5.671
	C231.476,120.379,231.487,111.537,230.505,102.78z M115.616,182.27c-36.813,0-66.654-29.841-66.654-66.653
	s29.842-66.653,66.654-66.653s66.654,29.841,66.654,66.653c0,12.495-3.445,24.182-9.428,34.176l-29.186-29.187
	c2.113-4.982,3.229-10.383,3.228-15.957c0-10.915-4.251-21.176-11.97-28.893c-7.717-7.717-17.978-11.967-28.891-11.967
	c-3.642,0-7.267,0.484-10.774,1.439c-1.536,0.419-2.792,1.685-3.201,3.224c-0.418,1.574,0.053,3.187,1.283,4.418
	c0,0,14.409,14.52,19.23,19.34c0.505,0.505,0.504,1.71,0.433,2.144l-0.045,0.317c-0.486,5.3-1.423,11.662-2.196,14.107
	c-0.104,0.103-0.202,0.19-0.308,0.296c-0.111,0.111-0.213,0.218-0.32,0.328c-2.477,0.795-8.937,1.743-14.321,2.225l0.001-0.029
	l-0.242,0.061c-0.043,0.005-0.123,0.011-0.229,0.011c-0.582,0-1.438-0.163-2.216-0.94c-5.018-5.018-18.862-18.763-18.862-18.763
	c-1.242-1.238-2.516-1.498-3.365-1.498c-1.979,0-3.751,1.43-4.309,3.481c-3.811,14.103,0.229,29.273,10.546,39.591
	c7.719,7.718,17.981,11.968,28.896,11.968c5.574,0,10.975-1.115,15.956-3.228l29.503,29.503
	C141.125,178.412,128.825,182.27,115.616,182.27z"/>
</svg>
            Serviços
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