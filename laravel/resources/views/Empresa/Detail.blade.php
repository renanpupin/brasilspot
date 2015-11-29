@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @can('AcessoComerciante')
    @include('layouts.sidebarComerciante')
    @endcan
    @can('AcessoVendedor')
    @include('layouts.sidebarVendedor')
    @endcan
    @can('AcessoAdministrador')
    @include('layouts.sidebarAdmin')
    @endcan
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Imobiliária Brasil</h2>
    </div>
    <div class="content-slogan grid-m-12 grid-s-12 grid-xs-12">
        <h6>Construindo o que você precisa</h6>
    </div>

    <div id="breadcrumbs" class="grid-m-9 grid-s-9 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('/') }}">Sua Empresa</a></li>
                    <li>Imobiliaria Brasil</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="grid-m-3 grid-s-3 grid-xs-12">
        <a id="btnNovo" class="btn btn-primary ripple" style="margin-top: 25px;" href="{{ url('SuaEmpresa/Editar') }}">
            <span class="text-content">Editar</span>
        </a>
    </div>


    {{--<span class="separator"></span>--}}


    <div id="visualizar" class="grid-m-12 grid-s-12 grid-xs-12">

        <div class="row">
            <div id="galeria-empresa" class="form-group grid-m-6 grid-s-6 grid-xs-12">
                <a class="galeria-item galeria-item-feature" href="http://lorempixel.com/600/400" data-lightbox="galeria-empresas">
                    <img class="galeria-item-image" src="http://lorempixel.com/600/400" alt="" />
                </a>

                <a class="galeria-item" href="http://lorempixel.com/550/300" data-lightbox="galeria-empresas">
                    <img class="galeria-item-image" src="http://lorempixel.com/550/300" alt="" />
                </a>

                <a class="galeria-item" href="http://lorempixel.com/700/350" data-lightbox="galeria-empresas">
                    <img class="galeria-item-image" src="http://lorempixel.com/700/350" alt="" />
                </a>

                <a class="galeria-item" href="http://lorempixel.com/450/350" data-lightbox="galeria-empresas">
                    <img class="galeria-item-image" src="http://lorempixel.com/450/350" alt="" />
                </a>

                <a class="galeria-item" href="http://lorempixel.com/600/350" data-lightbox="galeria-empresas">
                    <img class="galeria-item-image" src="http://lorempixel.com/600/350" alt="" />
                </a>
            </div>

            <div class="info-empresa grid-m-6 grid-s-6 grid-xs-12">
                <label>
                    <i class="material-icons">phone</i>
                </label>
                <span class="text-caption">
                    (11) 99999-9999
                </span>
            </div>

            <div class="info-empresa grid-m-6 grid-s-6 grid-xs-12">
                <label>
                    <i class="material-icons">place</i>
                </label>
                <span class="text-caption">
                    Rua Brasília, 154 - Centro. São Paulo - SP
                </span>
            </div>

            <div class="info-empresa grid-m-6 grid-s-6 grid-xs-12">
                <label>
                    <i class="material-icons">navigation</i>
                </label>
                <span class="text-caption">
                    -51.512, -21.123
                </span>
            </div>

            <div class="info-empresa grid-m-6 grid-s-6 grid-xs-12">
                <label>
                    <i class="material-icons">access_time</i>
                </label>
                <span class="text-caption">
                    Segunda à sexta das 08:00 às 18:00
                </span>
            </div>

            <div class="cartoes content-cartoesAceitos grid-m-6 grid-s-12 grid-xs-12">
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

            <div class="content-social grid-m-6 grid-s-6 grid-xs-12">
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
            </div>

            <div class="content-info grid-m-12 grid-s-12 grid-xs-12">
                <h3>Informações</h3>
                <p>Sobre a Imobiliária Brasil</p>
                <p class="content-descricao text-caption">Lorem ipsum Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum
                    Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum
                    Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum</p>
            </div>

            <div class="empresa-servicos grid-m-12 grid-s-12 grid-xs-12">
                <label>
                    <i class="material-icons">business</i>
                    Serviços
                </label>
                <div class="row">
                    <div class="grid-m-3 grid-s-3 grid-xs-12">
                        <p>- Acesso para deficientes</p>
                    </div>
                    <div class="grid-m-3 grid-s-3 grid-xs-12">
                        <p>- Ar Condicionado</p>
                    </div>
                    <div class="grid-m-3 grid-s-3 grid-xs-12">
                        <p>- Segurança</p>
                    </div>
                    <div class="grid-m-3 grid-s-3 grid-xs-12">
                        <p>- Wifi</p>
                    </div>
                </div>
            </div>

            <div id="tags" class="empresa-tags grid-m-12 grid-s-12 grid-xs-12">
                <label>
                    <i class="material-icons">bookmark</i>
                    Tags
                </label>
                <a href="javascript:void(0)"><span>São Paulo</span></a>
                <a href="javascript:void(0)"><span>Imobiliária</span></a>
                <a href="javascript:void(0)"><span>Bairro Centro</span></a>
                <a href="javascript:void(0)"><span>Ar Condicionado</span></a>
                <a href="javascript:void(0)"><span>Wi-fi</span></a>
            </div>

        </div>
    </div>

@stop