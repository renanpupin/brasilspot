<div id="sidebar">
    <div class="sidebar-hamburger grid-m-12 grid-xs-3">
        <span class="toggleMenu text-menu"><i class="material-icons">menu</i></span>
    </div>
    <div class="sidebar-logo grid-m-12 grid-xs-1">
        <img src="{!! asset('assets/img/logo.00_png_srb') !!}">
    </div>
    <div class="sidebar-logo-text grid-m-12 grid-xs-7">
        <img class="brand-text" src="{!! asset('assets/img/logo_texto.png') !!}">
    </div>

    <div class="sidebar-menu grid-m-12 grid-xs-12">
        <nav id="sideMenu" class="navbar" role="navigation">
            <div class="menu-text text-menu">
                <span class="toggleMenuDesligado"><i class="material-icons">menu</i></span>
                MENU
            </div>
            <ul role="menu">
                <li>
                    <a href="{{ url('Resumo' )}}" class="{{ Request::segment(1) === 'Resumo' ? 'active' : null }}">
                        <i class="material-icons" style="color: #DB0465;">dashboard</i>Resumo
                    </a>
                </li>
                <li>
                    <a href="{{ url('SuaEmpresa' )}}" class="{{ Request::segment(1) === 'SuaEmpresa' ? 'active' : null }}">
                        <i class="material-icons" style="color: #E66D1C;">account_balance</i>Sua Empresa
                    </a>
                </li>
                <li>
                    <a href="{{ url('SuasFiliais' )}}" class="{{ Request::segment(1) === 'SuasFiliais' ? 'active' : null }}">
                        <i class="material-icons" style="color: #E6BD35;">home</i>Suas Filiais
                    </a>
                </li>
                <li>
                    <a href="{{ url('SuaAssinatura' )}}" class="{{ Request::segment(1) === 'SuaAssinatura' ? 'active' : null }}">
                        <i class="material-icons" style="color: #AECC1A;">assignment</i>Sua Assinatura
                    </a>
                </li>
                <li>
                    <a href="{{ url('Reclamar' )}}" class="{{ Request::segment(1) === 'Reclamar' ? 'active' : null }}">
                        <i class="material-icons" style="color: #11939C;">mood_bad</i>Reclamar
                    </a>
                </li>
                <li>
                    <a href="{{ url('ReportarErro' )}}" class="{{ Request::segment(1) === 'ReportarErro' ? 'active' : null }}">
                        <i class="material-icons" style="color: #266CAD;">bug_report</i>Reportar Erro
                    </a>
                </li>
                <li>
                    <a href="{{ url('SuasMensagens' )}}" class="{{ Request::segment(1) === 'SuasMensagens' ? 'active' : null }}">
                        <i class="material-icons" style="color: #A32995;">mail</i>Mensagens
                    </a>
                </li>
                <li>
                    <a href="{{ url('SuasPromocoes' )}}" class="{{ Request::segment(1) === 'SuasPromocoes' ? 'active' : null }}">
                        <i class="material-icons" style="color: #BA2879;">local_offer</i>Promoções
                    </a>
                </li>
                <li class="menu-options">
                    <div class="row">
                        <div class="grid-m-6 grid-s-6 grid-xs-6" style="padding-right: 0px;">
                            <a href="{{ url('Perfil' )}}">
                                <i class="material-icons">person</i>Editar Perfil
                            </a>
                        </div>
                        <div class="grid-m-6 grid-s-6 grid-xs-6" style="padding-left: 0px;">
                            <a href="{{ url('Logout' )}}">
                                <i class="material-icons">arrow_forward</i>Logout
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </div>

</div>


@section('scripts')
    <script type="text/javascript" src="{!! asset('assets/js/jquery.inputmask.bundle.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/js/jquery.inputmask.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/js/inputmask.regex.extensions.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/js/usuario/usuario.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/js/empresa/empresa.js') !!}"></script>
@stop