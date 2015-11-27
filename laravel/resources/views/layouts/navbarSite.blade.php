<nav id="nav" class="navSite">
    <button class="menu">
        <em class="hamburger"></em>
    </button>
    <div class="brand">
        <a href="{{url('/')}}">
            <img class="" src="{!! asset('assets/img/logo.00_png_srb') !!}" width="50px">
            <img class="brand-text" src="{!! asset('assets/img/logo_texto.png') !!}">
        </a>
    </div>
    <ul class="navbar">
        {{--<li>--}}
            {{--<a href="#">--}}
                {{--<input type="text" name="pesquisaEmpresa" id="pesquisaEmpresa" placeholder="O que você procura?">--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="#">--}}
                {{--<input type="text" name="pesquisaEndereco" id="pesquisaEndereco" placeholder="Onde?">--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li>--}}
        {{--</li>--}}
        <li class="content-center">
            <div class="center-row row">
                <div class="nav-item">
                    {{--<a href="#">--}}
                    {{--Route::getCurrentRoute()->getParameter('busca');--}}
                        <input type="text" name="pesquisaEmpresa" id="pesquisaEmpresa" placeholder="O que você procura?">
                    {{--</a>--}}
                </div>
                <div class="nav-item">
                    {{--<a href="#">--}}
                        <input type="text" name="pesquisaEndereco" id="pesquisaEndereco" placeholder="Onde?">
                    {{--</a>--}}
                </div>
                <div class="nav-item">
                    <button type="submit" id="btnEncontre" class="btn btn-primary ripple">
                        <span class="text-content">Encontre</span>
                    </button>
                </div>
                <div class="nav-item">
                    <a href="{{url('categorias')}}" id="btnEncontre" class="btn btn-secundary ripple">
                        <span class="text-content">Categorias</span>
                    </a>
                </div>
            </div>
        </li>
        <li class="login-right">
            <a href="{{url('Login')}}">
                <i class="material-icons">person</i>
                Login/Assinar
            </a>
        </li>
    </ul>
</nav>







{{--<div id="sidebar">--}}
    {{--<div class="sidebar-hamburger grid-m-12 grid-s-3 grid-xs-3">--}}
        {{--<span class="toggleMenu text-menu"><i class="material-icons">menu</i></span>--}}
    {{--</div>--}}
    {{--<div class="sidebar-logo grid-m-12 grid-s-1 grid-xs-1">--}}
        {{--<img src="{!! asset('assets/img/logo.00_png_srb') !!}">--}}
    {{--</div>--}}
    {{--<div class="sidebar-logo-text grid-m-12 grid-s-7 grid-xs-7">--}}
        {{--<span class="brasil">BRASIL</span>--}}

        {{--<span class="spot">SPOT</span>--}}
    {{--</div>--}}

    {{--<div class="sidebar-menu grid-m-12 grid-s-12 grid-xs-12">--}}
        {{--<nav id="sideMenu" class="navbar" role="navigation">--}}
            {{--<div class="menu-text text-menu">--}}
                {{--<span class="toggleMenuDesligado"><i class="material-icons">menu</i></span>--}}
                {{--MENU--}}
            {{--</div>--}}
            {{--<ul role="menu">--}}
                {{--<li>--}}
                    {{--<a href="{{ url('Inicio' )}}" class="{{ Request::segment(1) === 'Inicio' ? 'active' : null }}">--}}
                        {{--<i class="material-icons" style="color: #DB0465;">home</i>Início--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="{{ url('Empresas' )}}" class="{{ Request::segment(1) === 'Empresas' ? 'active' : null }}">--}}
                        {{--<i class="material-icons" style="color: #E66D1C;">place</i>Empresas--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="{{ url('Categorias' )}}" class="{{ Request::segment(1) === 'Categorias' ? 'active' : null }}">--}}
                        {{--<i class="material-icons" style="color: #E6BD35;">label</i>Categorias--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="{{ url('Comercios' )}}" class="{{ Request::segment(1) === 'Comercios' ? 'active' : null }}">--}}
                        {{--<i class="material-icons" style="color: #E6BD35;">business</i>Comércios--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="{{ url('Servicos' )}}" class="{{ Request::segment(1) === 'Servicos' ? 'active' : null }}">--}}
                        {{--<i class="material-icons" style="color: #AECC1A;">build</i>Serviços--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="{{ url('Atracoes' )}}" class="{{ Request::segment(1) === 'Atracoes' ? 'active' : null }}">--}}
                        {{--<i class="material-icons" style="color: #11939C;">insert_emoticon</i>Atrações--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="menu-options">--}}
                    {{--<div class="row">--}}
                        {{--<div class="grid-m-12 grid-s-12 grid-xs-12" style="">--}}
                            {{--<a href="{{ url('Login' )}}">--}}
                                {{--<i class="material-icons">group</i>Área de vendedores--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
            {{--</ul>--}}
            {{--<div class="grid-m-12 grid-s-12 grid-xs-12" style="border-top: 1px solid #e7e7e7;">--}}

                {{--<form id="formLocation">--}}
                    {{--<div class="row">--}}
                        {{--<div class="form-group grid-m-12 grid-s-12 grid-xs-12">--}}
                            {{--<label for="pesquisaEmpresa">O que você procura?</label>--}}
                            {{--<input type="text" name="pesquisaEmpresa" id="pesquisaEmpresa">--}}
                            {{--<p class="input-hint">--}}
                                {{--(Restaurante, bar, loja, etc.)--}}
                            {{--</p>--}}
                        {{--</div>--}}
                        {{--<div class="form-group grid-m-12 grid-s-12 grid-xs-12">--}}
                            {{--<label for="pesquisaEndereco">Onde?</label>--}}
                            {{--<input type="text" name="pesquisaEndereco" id="pesquisaEndereco">--}}
                            {{--<p class="input-hint">--}}
                                {{--(Um endereço específico, bairro ou cidade.)--}}
                            {{--</p>--}}
                        {{--</div>--}}
                        {{--<div class="form-group grid-m-12 grid-s-12 grid-xs-12 button-field">--}}
                            {{--<a href="{{ url('Empresas' )}}" id="btnEncontre" class="btn btn-primary ripple">--}}
                                {{--<i class="material-icons">send</i> <span class="text-content">Encontre</span>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</nav>--}}
    {{--</div>--}}

{{--</div>--}}