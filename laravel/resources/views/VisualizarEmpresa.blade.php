@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarSite')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Imobiliária Brasil</h2>
    </div>
    <div class="content-slogan grid-m-12 grid-s-12 grid-xs-12">
        <h6>Construindo o que você precisa</h6>
    </div>
    {{--<span class="separator"></span>--}}


    <div id="visualizar" class="grid-m-12 grid-s-12 grid-xs-12">

        <div class="row">
            <div id="galeria-empresa" class="form-group grid-m-5 grid-s-12 grid-xs-12">
                <div class="row">
                    <div class="galeria-feature">
                        <img src="{!! asset('assets/img/placeholder-company.png') !!}">
                    </div>
                </div>

                {{--<div class="row">--}}
                    {{--<div class="filtroEmpreendimento content-tipoEmpreendimento grid-m-6 grid-s-6 grid-xs-12">--}}
                        {{--<a href="javascript:void(0)">--}}
                            {{--<span class="filtroServico filtroTipoEmpreendimento">--}}
                                {{--<svg>--}}
                                    {{--<use xlink:href="{!! asset('assets/img/servicos.svg#servicosIcon') !!}"></use>--}}
                                {{--</svg>--}}
                                {{--Serviço--}}
                            {{--</span>--}}
                        {{--</a>--}}
                    {{--</div>--}}

                    {{--<div class="filtroCategoria content-categoria grid-m-6 grid-s-6 grid-xs-12">--}}
                        {{--<a href="javascript:void(0)">--}}
                            {{--<span class="filtroItemCategoria filtroTipoCategoria">--}}
                                {{--<i class="material-icons">format_list_bulleted</i>--}}
                                {{--Imobiliário--}}
                            {{--</span>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}

            </div>

            <div class="content-descricao grid-m-7 grid-s-12 grid-xs-12">
                <p class="text-caption">Lorem ipsum Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum
                Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum
                Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum</p>
            </div>

            <div class="content-horarioFuncionamento grid-m-7 grid-s-12 grid-xs-12">
                <label>
                    <i class="material-icons">access_time</i>
                    Horário de Funcionamento
                </label>
                <p class="text-caption">
                    Segunda à sexta das 08:00 às 18:00
                </p>
            </div>

            <div class="cartoes content-cartoesAceitos grid-m-7 grid-s-12 grid-xs-12">
                <label>
                    <i class="material-icons">credit_card</i>
                    Cartões Aceitos <span class="content-tipoCartoesAceitos">(Débito e Crédito)</span>
                </label>
                <p class="cartoes-bandeiras text-caption">
                    <span>
                        <img src="http://s.cdpn.io/5734/visa.png">
                        <img src="http://s.cdpn.io/5734/mastercard.png">
                        <img src="http://s.cdpn.io/5734/american-express.png">
                    </span>
                </p>
                {{--<p class="text-caption cartaoNaoAceito"><i class="material-icons">mood_bad</i>Não Aceitamos cartões </p>--}}
            </div>

            <div class="content-filiais grid-m-12 grid-s-12 grid-xs-12">
                <h3>Filiais</h3>
                <div class="row">
                    <div class="grid-m-4 grid-s-4 grid-xs-12">
                        <label>
                            <i class="material-icons">phone</i>
                            Telefone
                        </label>
                        <p class="text-caption">
                            (11)9999-9999
                        </p>
                    </div>
                    <div class="grid-m-4 grid-s-4 grid-xs-12">
                        <label>
                            <i class="material-icons">place</i>
                            Endereço {{--(<i class="material-icons">home</i> Endereço principal)--}}
                        </label>
                        <p class="text-caption">
                            Rua Brasília, 154 - Centro. São Paulo - SP
                        </p>
                    </div>
                    <div class="grid-m-4 grid-s-4 grid-xs-12">
                        <label>
                            <i class="material-icons">navigation</i>
                            Coordendas
                        </label>
                        <p class="text-caption">
                            -51.512, -21.123
                        </p>
                    </div>
                </div>
            </div>


            <div id="tags" class="empresa-tags grid-m-8 grid-s-8 grid-xs-12">
                <label>
                    <i class="material-icons">bookmark</i>
                    Tags
                </label>
                <a href="javascript:void(0)"><span>São Paulo</span></a>
                <a href="javascript:void(0)"><span>Imobiliária</span></a>
                <a href="javascript:void(0)"><span>Bairro Centro</span></a>
            </div>
            <div class="content-social grid-m-4 grid-s-4 grid-xs-12">
                <label>
                    <i class="material-icons">share</i>
                    Social
                </label>
                <span class="content-social-item">
                    <img src="http://cdn.flaticon.com/svg/59/59763.svg">
                    <a class="content-social-site text-caption">Site</a>
                </span>
                <span class="content-social-item">
                    <img src="http://cdn.flaticon.com/png/256/59183.png">
                    <a class="content-social-facebook text-caption">Facebook</a>
                </span>
                {{--<span class="content-social-item">--}}
                {{--<img src="http://cdn.flaticon.com/svg/33/33447.svg">--}}
                {{--<a class="content-social-whatsapp text-caption">Whatsapp</a>--}}
                {{--</span>--}}
            </div>

        </div>
        {{--<div class="row">--}}
            {{--<div class="grid-m-3 grid-m-offset-9 grid-s-3 grid-s-offset-9 button-field" style="margin-top: 25px;">--}}
                {{--<a href="{{ url('/Inicio') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">--}}
                    {{--<span class="text-content">Voltar</span>--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>

    {{--<div class="content-links grid-m-12 grid-s-12 grid-xs-12">--}}
    {{--<div class="row">--}}
    {{--<div class="grid-m-12 grid-s-12 grid-xs-12">--}}
    {{--<a href="#">Grid</a>--}}
    {{--<a href="#">List</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}



@stop