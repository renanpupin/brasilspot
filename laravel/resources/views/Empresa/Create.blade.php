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

    <link rel="stylesheet" href="{{ asset('assets/css/dropzone.css') }}">


    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Cadastro da Empresa</h2>
        {{--<p class="text-caption">Por favor, nos informe seus dados e da sua empresa. Os dados abaixo <strong>NÃO</strong> serão divulgados no site.</p>--}}
        <!-- <p class="text-caption">Campos com (*) são obrigatórios</p> -->
        <!-- <p class="text-caption">Suas edições serão aprovadas dentro de 72hs.</p> -->

    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('SuaEmpresa') }}">Sua Empresa</a></li>
                    <li>Cadastrar</li>
                </ul>
            </div>
        </div>
    </div>

    @if(Session::has('flash_message'))
        <div class="grid-m-12 grid-s-12 grid-xs-12">
            <div class="alert alert-success" role="alert">
                <button type="button" class="close-alert">×</button>
                <i class="material-icons">done</i>
                {{ Session::get('flash_message') }}
            </div>
        </div>
    @endif
    @if($errors->any())
        <div class="grid-m-12 grid-s-12 grid-xs-12">
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close-alert">×</button>
                @foreach($errors->all() as $error)
                    <p><i class="material-icons">error_outline</i>{{ $error }}</p>
                @endforeach
            </div>
        </div>
    @endif

    <div id="cadastro" class="grid-m-12 grid-s-12 grid-xs-12">
        {!! Form::Open(['route' => 'Empresa.store', 'method' => 'POST', 'files' => true]) !!}

        <div class="row">
            <div id="galeria-empresa" class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <div class="row">

                    <div class="galeria-feature grid-m-12 grid-s-12 grid-xs-12">
                        <label for="imagemPrincipal">Selecione a imagem principal *</label>
                        {!! Form::file('imagemPrincipal', null) !!}
                    </div>
                    <div class="galeria-feature grid-m-12 grid-s-12 grid-xs-12">
                        <label for="imagemPrincipal">Selecione as imagens da galeria</label>
                        {!! Form::file('imagem1') !!}
                        {!! Form::file('imagem2') !!}
                        {!! Form::file('imagem3') !!}
                        {!! Form::file('imagem4') !!}
                    </div>
                </div>
            </div>
            {{--<div class="form-group grid-m-6 grid-s-12 grid-xs-12">--}}
            {{--<p class="text-caption">- Campos com (*) são obrigatórios</p>--}}
            {{--</div>--}}

            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                    <span class="text-display-1">
                        <i class="material-icons" style="font-size: inherit;">lock_outline</i>
                        Informações Privadas
                    </span>
                <p class="text-caption">- As informações inseridas abaixo não serão exibidas para o público</p>
            </div>

            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="nomeEmpreendedor">Nome do Empreendedor *</label>
                <input type="text" name="nomeEmpreendedor" id="nomeEmpreendedor">
            </div>
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="razaoSocial">Razão Social *</label>
                <input type="text" name="razaoSocial" id="razaoSocial">
            </div>
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="cpfCnpj">CPF ou CNPJ *</label>
                <input type="text" name="cpfCnpj" id="cpfCnpj">
            </div>
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="email">Email *</label>
                <input type="email" name="email" id="email">
            </div>

            @can('AcessoAdministrador')
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="cliente">Clientes *</label>
                {!! Form::select('usuarios',$usuarios,'Selecione a usuário.')!!}
            </div>
            @endcan

            @can('AcessoVendedor')
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="cliente">Clientes *</label>
                {!! Form::select('usuarios',$usuarios,'Selecione a usuário.')!!}
            </div>
            @endcan

            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                    <span class="text-display-1">
                        <i class="material-icons" style="font-size: inherit;">lock_open</i>
                        Informações Públicas
                    </span>
                <p class="text-caption">- As informações inseridas abaixo poderão ser vistas por qualquer um</p>
            </div>
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                <label for="nomeFantasia">Nome Fantasia *</label>
                <input type="text" name="nomeFantasia" id="nomeFantasia">
            </div>
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                <label for="slogan">Slogan *</label>
                <input type="text" name="slogan" id="slogan">
            </div>
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                <label for="descricao">Descrição *</label>
                <p class="input-hint">(O que você mais quer que as pessoas saibam)</p>
                <textarea name="descricao" id="descricao"></textarea>
            </div>
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="selecionarTipoEmpreendimento">Tipo do Empreendimento *</label>
                {!! Form::select('tiposEmpreendimentos', $tiposEmpresas,'Selecione o tipo do empreendimento') !!}
            </div>
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="selecionarCategoria">Categorias *</label>
                {!! Form::select('categorias',$categorias,'Selecione a categoria da empresa')!!}
            </div>
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="horarioFuncionamento">Horário de Funcionamento *</label>
                <input type="text" name="horarioFuncionamento" id="horarioFuncionamento">
            </div>
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="selecionaTipoCartaoAceito">Tipos de cartões aceitos </label>
                {!! Form::select('tiposCartoes', $tiposCartoes,'Selecione o tipo do cartão.') !!}
            </div>
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="inputTipoCartoesAceitos">Cartões Aceitos</label>
                @foreach($cartoes as $cartao)
                    <div class="check-inline">
                        {!!  Form::checkbox('options['+$cartao->id+']', $cartao->bandeira) !!}
                        {{  $cartao->bandeira }}
                        {{--<input type="checkbox" name="inputCartoesAceitos{{ $cartao->id }}" id="{{ $cartao->id }}" value="{{ $cartao->bandeira }}">{{ $cartao->bandeira }}--}}
                    </div>
                @endforeach

            </div>
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="inputAtendeCasa">Sua empresa atende em casa *</label>
                <p class="input-hint">(Entrega de comida, presta serviços, busca de animais em casa para tosa, entre outros.)</p>
                <label>
                    <input type="radio" name="atendeCasa" id="atendeCasa1" value="SIM" checked>
                    SIM
                </label>
                <label>
                    <input type="radio" name="atendeCasa" id="atendeCasa2" value="NÃO">
                    NÃO
                </label>
            </div>
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="inputLinkFacebook">Link para sua página do Facebook *</label>
                <input type="text" name="linkFacebook" id="linkFacebook" class="input-facebook" placeholder="Exemplo: https://www.facebook.com/brasilspot">
            </div>
            <div class="form-group grid-m-6 grid-s-12 grid-xs-12">
                <label for="inputLinkSiteEmpresa">Link para o site da empresa *</label>
                <input type="text" name="linkSite" id="linkSite" class="input-facebook" placeholder="Exemplo: https://www.suaempresa.com.br">
            </div>
            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                <label for="inputSelecionarTags">Informe suas tags *</label>
                <p class="input-hint">(As tags facilitam sua empresa ser encontrada em nossas buscas busca.</p>
                <p class="input-hint">(Digite no máximo 5 tags, e separe-as com vírgula)</p>
                <input type="text" name="tags" id="tags" class="input-facebook" placeholder="EX: tag1, tag2, tag3">
            </div>
        </div>
        <div class="row">
            <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 grid-xs-12 button-field">
                <a href="{{ url('SuaEmpresa') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
                    <span class="text-content">Voltar</span>
                </a>
            </div>
            <div class="form-group grid-m-3 grid-s-3 grid-xs-12 button-field">
                {!! Form::button('<span class="text-content">Cadastrar</span>',[
                    'id' => 'btnCadastrar',
                    'type' => 'submit',
                    'class' => 'btn btn-primary ripple'
                    ])!!}
            </div>
        </div>

        {!! Form::Close() !!}
    </div>

    <input type="hidden" value="{{ Session::getToken() }}" id="hiddenToken">
    <input type="hidden" value="{{ url('/') }}" id="hiddenBaseUrl">

@stop


@section('script')
    <script type="text/javascript" src="{{ asset('assets/js/dropzone.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/configDropzone.js') }}"></script>
@stop
