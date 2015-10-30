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
        <form id="formBuscaEmpresas">
            <div class="row">
                <div class="form-group grid-m-6 grid-s-6 grid-xs-12">
                    <label for="selecionarCategoria">Categoria</label>
                    <input type="text" id="selecionarCategoria" placeholder="Busque por categorias">
                </div>
                <div class="form-group grid-m-6 grid-s-6 grid-xs-12">
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

        <div class="row">
            <div class="filtroEmpreendimento form-group grid-m-12 grid-s-12 grid-xs-12" style="margin-top: 0px;">
                <label for="selecionarTipoEmpreendimento" style="text-align: left;">Filtros</label>
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
                    <div class="grid-m-4 grid-s-4 grid-xs-4" style="text-align: center;">
                        <a href="javascript:void(0)">
                    <span class="filtroServico filtroTipoEmpreendimento">
                    <svg>
                        <use xlink:href="{!! asset('assets/img/servicos.svg#servicosIcon') !!}"></use>
                    </svg>
                    Serviço
                    </span>
                        </a>
                    </div>
                    <div class="grid-m-4 grid-s-4 grid-xs-4" style="text-align: right;">
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
        </div>
    </div>

    <div class="content-empresas grid-m-12 grid-s-12 grid-xs-12">
        <div class="row">
            <div class="grid-m-12 grid-s-12 grid-xs-12">
                <div class="empresa-item ">
                    <div class="row">
                        <div class="empresa-logo grid-m-3 grid-s-4 grid-xs-4">
                            <img src="assets/img/placeholder-company.png">
                        </div>
                        <div class="empresa-nome grid-m-9 grid-s-8 grid-xs-8">
                            <div class="text-title">
                                Imobiliária Brasil
                            </div>
                            <div class="text-caption">
                                <p>Descrição da Empresa Descrição da Empresa Descrição da Empresa Descrição da Empresa Descrição</p>
                            </div>
                            <div class="row">
                                <div class="empresa-feature">
                                    <span class="empresa-feature-item grid-m-8 grid-s-12 grid-xs-12">
                                        <p>
                                            <i class="material-icons">location_on</i>
                                            Rua Brasília, 123 - Centro. São Paulo - SP
                                        </p>
                                    </span>
                                    <span class="empresa-feature-item grid-m-4 grid-s-12 grid-xs-12">
                                        <p>
                                            <i class="material-icons">phone</i>
                                            (11)9999-9999
                                        </p>
                                    </span>
                                    <span class="empresa-feature-item grid-m-8 grid-s-12 grid-xs-12">
                                        <p>
                                            <i class="material-icons">access_time</i>
                                            Segunda a sexta das 08:00 às 18:00
                                        </p>
                                    </span>
                                    <span class="empresa-feature-item grid-m-4 grid-s-12 grid-xs-12">
                                        <p>
                                            <i class="material-icons">credit_card</i>
                                            Débito e Crédito
                                        </p>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="grid-m-4 grid-s-6 grid-xs-6">
                            <div class="empresa-categoria text-caption">
                                <i class="material-icons">toys</i>
                                <!-- <i class="material-icons">filter_vintage</i> -->
                                Gastronomia
                            </div>
                        </div>
                        <div class="grid-m-4 grid-s-6 grid-xs-6" style="text-align: center;">
                            <div class="empresa-categoria text-caption">
                                <i class="material-icons">business</i>
                                Comércio
                            </div>
                        </div>

                        <div class="grid-m-4 grid-s-12 grid-xs-12 button-field">
                            <a href="{{ url('Empresas/1') }}" id="btnView" class="btn round-btn ripple" title="Ver Empresa">
                                <i class="material-icons">arrow_forward</i>
                            </a>
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

    <div class="floatingButton" title="Login">
        <a href="{{ url('Login' )}}">
            <i class="material-icons">person</i>
        </a>
    </div>
@stop