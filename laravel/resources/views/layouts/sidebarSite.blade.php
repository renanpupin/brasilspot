<div id="sidebar">
    <div class="sidebar-hamburger grid-m-12 grid-s-3 grid-xs-3">
        <span class="toggleMenu text-menu"><i class="material-icons">menu</i></span>
    </div>
    <div class="sidebar-logo grid-m-12 grid-s-1 grid-xs-1">
        <img src="{!! asset('assets/img/logo.00_png_srb') !!}">
    </div>
    <div class="sidebar-logo-text grid-m-12 grid-s-7 grid-xs-7">
        <span class="brasil">BRASIL</span>

        <span class="spot">SPOT</span>
    </div>

    <div class="sidebar-menu grid-m-12 grid-s-12 grid-xs-12">
        <nav id="sideMenu" class="navbar" role="navigation">
            <div class="menu-text text-menu">
                <span class="toggleMenuDesligado"><i class="material-icons">menu</i></span>
                MENU
            </div>
            <ul role="menu">
                <li>
                    <a href="{{ url('Inicio' )}}" class="{{ Request::segment(1) === 'Inicio' ? 'active' : null }}">
                        <i class="material-icons" style="color: #DB0465;">place</i>Empresas
                    </a>
                </li>
                <li>
                    <a href="{{ url('Sobre' )}}" class="{{ Request::segment(1) === 'Sobre' ? 'active' : null }}">
                        <i class="material-icons" style="color: #E66D1C;">description</i>Sobre
                    </a>
                </li>
                <li>
                    <a href="{{ url('Planos' )}}" class="{{ Request::segment(1) === 'Plano' ? 'active' : null }}">
                        <i class="material-icons" style="color: #E6BD35;">trending_up</i>Planos
                    </a>
                </li>
                <li>
                    <a href="{{ url('Contato' )}}" class="{{ Request::segment(1) === 'Contato' ? 'active' : null }}">
                        <i class="material-icons" style="color: #AECC1A;">send</i>Contato
                    </a>
                </li>
                <li class="menu-options">
                    <div class="row">
                        <div class="grid-m-12 grid-s-12 grid-xs-12" style="">
                            <a href="{{ url('Login' )}}">
                                <i class="material-icons">group</i>Área de vendedores
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </div>

</div>