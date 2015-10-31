@extends('layouts.masterSite')

@section('title', 'Bem vindo!')

@section('navbar')
    @parent
    @include('layouts.navbarSite')
@stop

@section('sideFilter')
    @parent
    @include('layouts.sideFilter')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>
            Destaques Locais
        </h2>
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

                        <div class="grid-m-8 grid-s-6 grid-xs-6">
                            <div class="empresa-categoria text-caption">
                                <i class="material-icons">toys</i>
                                <!-- <i class="material-icons">filter_vintage</i> -->
                                Gastronomia
                            </div>
                        </div>
                        {{--<div class="grid-m-4 grid-s-6 grid-xs-6" style="text-align: center;">--}}
                            {{--<div class="empresa-categoria text-caption">--}}
                                {{--<i class="material-icons">business</i>--}}
                                {{--Comércio--}}
                            {{--</div>--}}
                        {{--</div>--}}

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

@stop