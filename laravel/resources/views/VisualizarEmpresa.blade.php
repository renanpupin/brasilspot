@extends('layouts.masterSiteSemSidebar')

@section('title', 'Bem vindo!')

@section('navbar')
    @parent
    @include('layouts.navbarSite')
@stop

@section('content')

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('/') }}">Inicio</a></li>
                    <li><a href="{{ url('Empresas') }}">Empresas</a></li>
                    <li><a href="{{ url('/') }}">Categoria</a></li>
                    <li><a href="{{ url('/') }}">Subcategoria</a></li>
                    <li>{{$empresa->nomeFantasia}}</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>{{$empresa->nomeFantasia}}</h2>
    </div>
    <div class="content-slogan grid-m-12 grid-s-12 grid-xs-12">
        <h6>{{$empresa->slogan}}</h6>
    </div>
    {{--<span class="separator"></span>--}}


    <div id="visualizar" class="grid-m-9 grid-s-8 grid-xs-12">

        <div class="row">
            <div id="galeria-empresa" class="form-group grid-m-6 grid-s-6 grid-xs-12">
                @foreach($empresa->FotoEmpresa as $foto)
                    @if($foto->destaque === 1)
                    <a class="galeria-item galeria-item-feature" href="/uploads/{{$foto->Foto->foto}}" data-lightbox="galeria-empresas">
                        <img class="galeria-item-image" src="/uploads/{{$foto->Foto->foto}}" alt="" />
                    </a>
                    @else
                        <a class="galeria-item" href="/uploads/{{$foto->Foto->foto}}" data-lightbox="galeria-empresas">
                            <img class="galeria-item-image" src="/uploads/{{$foto->Foto->foto}}" alt="" />
                        </a>
                    @endif
                @endforeach


                {{--<a class="galeria-item" href="http://lorempixel.com/550/300" data-lightbox="galeria-empresas">--}}
                    {{--<img class="galeria-item-image" src="http://lorempixel.com/550/300" alt="" />--}}
                {{--</a>--}}

                {{--<a class="galeria-item" href="http://lorempixel.com/700/350" data-lightbox="galeria-empresas">--}}
                    {{--<img class="galeria-item-image" src="http://lorempixel.com/700/350" alt="" />--}}
                {{--</a>--}}

                {{--<a class="galeria-item" href="http://lorempixel.com/450/350" data-lightbox="galeria-empresas">--}}
                    {{--<img class="galeria-item-image" src="http://lorempixel.com/450/350" alt="" />--}}
                {{--</a>--}}

                {{--<a class="galeria-item" href="http://lorempixel.com/600/350" data-lightbox="galeria-empresas">--}}
                    {{--<img class="galeria-item-image" src="http://lorempixel.com/600/350" alt="" />--}}
                {{--</a>--}}
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
                    {{$empresa->horarioFuncionamento}}
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
                    <a class="content-social-site text-caption" href="{{$empresa->linkSite}}">Site</a>
                </span>
                <span class="content-social-item">
                    <img src="http://cdn.flaticon.com/png/256/59183.png">
                    <a class="content-social-facebook text-caption" href="{{$empresa->linkFacebook}}">Facebook</a>
                </span>
            </div>

            <div class="content-info grid-m-12 grid-s-12 grid-xs-12">
                <h3>Informações</h3>
                <p>Sobre a Imobiliária Brasil</p>
                <p class="content-descricao text-caption">
                    {{$empresa->descricao}}
                </p>
            </div>

            <div class="empresa-servicos grid-m-12 grid-s-12 grid-xs-12">
                <label>
                    <i class="material-icons">business</i>
                    {{$empresa->TipoEmpresa->tipo}}
                </label>
                <div class="row">
                    @foreach($empresa->ServicoEmpresa as $servico)
                    <div class="grid-m-3 grid-s-3 grid-xs-12">
                        <p>- {{$servico->Servico->descricao}}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            <div id="tags" class="empresa-tags grid-m-12 grid-s-12 grid-xs-12">
                <label>
                    <i class="material-icons">bookmark</i>
                    Tags
                </label>

                <div class="row">
                @foreach($empresa->TagEmpresa as $tag)
                    <div class="grid-m-3 grid-s-3 grid-xs-12">
                        <p>- {{$tag->Tag->nome}}</p>
                    </div>
                @endforeach
                </div>
            </div>

        </div>
    </div>


    <div id="contato-empresa" class="form-group grid-m-3 grid-s-4 grid-xs-12">
        <div class="contato-wrapper">
            <div class="row">
                <img class="empresa-mapa" src="http://www.techmerry.com/wp-content/uploads/2014/08/Implement-GPS-data-for-your-Google-MAP.gif" width="100%">
            </div>
            <div class="contato-form">
                <p class="text-title">Entre em Contato</p>
                {!! Form::Open(['route' => 'Servico.show', 'method' => 'POST']) !!}
                <div class="row">
                    <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                        {!! Form::label('nome', 'Nome *',null,['for' => 'nome']) !!}
                        {!! Form::text('nome', null,['id' => 'nome']) !!}
                    </div>
                    <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                        {!! Form::label('email', 'Email *',null,['for' => 'email']) !!}
                        {!! Form::text('email', null,['id' => 'email']) !!}
                    </div>
                    <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                        {!! Form::label('mensagem', 'Mensagem *',null,['for' => 'mensagem']) !!}
                        {!! Form::textarea('mensagem', null,['id' => 'mensagem', 'rows' => 3]) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group grid-m-12 grid-s-12 grid-xs-12 button-field">
                        {!! Form::button('<span class="text-content">Enviar</span>',[
                            'id' => 'btnEnviar',
                            'type' => 'submit',
                            'class' => 'btn btn-primary ripple'
                            ])!!}
                    </div>
                </div>
                {!! Form::Close() !!}
            </div>
        </div>
    </div>

@stop

