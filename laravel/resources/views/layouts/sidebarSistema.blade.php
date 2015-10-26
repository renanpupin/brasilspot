<div id="sidebar">
    <div class="sidebar-hamburger grid-m-12 grid-xs-3">
        <span class="toggleMenu text-menu"><i class="material-icons">menu</i></span>
    </div>
    <div class="sidebar-logo grid-m-12 grid-xs-1">
        <img src="{!! asset('assets/img/logo.00_png_srb') !!}">
    </div>
    <div class="sidebar-logo-text grid-m-12 grid-xs-7">
        <span class="brasil">BRASIL</span>

        <span class="spot">SPOT</span>
    </div>

    <div class="sidebar-menu grid-m-12 grid-xs-12">
        <nav id="sideMenu" class="navbar" role="navigation">
            <div class="menu-text text-menu">
                <span class="toggleMenuDesligado"><i class="material-icons">menu</i></span>
                MENU
            </div>
            <ul role="menu">
                <li>
                    <a href="{{ url('Empresa' )}}" class="{{ Request::segment(1) === 'Empresa' ? 'active' : null }}">
                        <i class="material-icons" style="color: #DB0465;">account_balance</i>Empresas
                    </a>
                </li>
                <li>
                    <a href="{{ url('Filial' )}}" class="{{ Request::segment(1) === 'Filial' ? 'active' : null }}">
                        <i class="material-icons" style="color: #E66D1C;">home</i>Filiais
                    </a>
                </li>
                <li>
                    <a href="{{ url('Categoria' )}}" class="{{ Request::segment(1) === 'Categoria' ? 'active' : null }}">
                        <i class="material-icons" style="color: #E6BD35;">dns</i>Categorias
                    </a>
                </li>
                <li>
                    <a href="{{ url('Servico' )}}" class="{{ Request::segment(1) === 'Servico' ? 'active' : null }}">
                        <i class="material-icons" style="color: #AECC1A;">work</i>Serviços
                    </a>
                </li>
                <li>
                    <a href="{{ url('Plano' )}}" class="{{ Request::segment(1) === 'Plano' ? 'active' : null }}">
                        <i class="material-icons" style="color: #11939C;">assignment</i>Planos
                    </a>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0)" class="{{ Request::segment(1) === 'Cliente' ? 'active' : null }}">
                        <i class="material-icons" style="color: #266CAD;">person</i>Seus Clientes
                    </a>
                    <ul>
                        <li>
                            <a href="{{ url('Cliente/Gerenciar' )}}" class="{{ Request::segment(1) === 'Cliente' ? 'active' : null }}">
                                <i class="material-icons">person_add</i>Gerenciar seus clientes
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('Cliente/Edicoes' )}}" class="{{ Request::segment(1) === 'Edicoes' ? 'active' : null }}">
                                <i class="material-icons">sync_problem</i>Edições não aprovadas
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('Cliente/Reclamacoes' )}}" class="{{ Request::segment(1) === 'Reclamacoes' ? 'active' : null }}">
                                <i class="material-icons">mood_bad</i>Reclamações
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('Cliente/EmpresasDesativadas' )}}" class="{{ Request::segment(1) === 'EmpresasDesativadas' ? 'active' : null }}">
                                <i class="material-icons">location_off</i>Empresas desativadas
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="{{ url('Metas' )}}" class="{{ Request::segment(1) === 'Metas' ? 'active' : null }}">
                        <i class="material-icons" style="color: #A32995;">trending_up</i>Suas Metas
                    </a>
                    <ul>
                        <li>
                            <a href="{{ url('Metas/Historico' )}}" class="{{ Request::segment(1) === 'Metas' ? 'active' : null }}">
                                <i class="material-icons">history</i>Histórico de Vendas
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('Metas/Mensal' )}}" class="{{ Request::segment(1) === 'Metas' ? 'active' : null }}">
                                <i class="material-icons">open_in_browser</i>Metas do mês
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="{{ url('Solicitacoes' )}}" class="{{ Request::segment(1) === 'Solicitacoes' ? 'active' : null }}">
                        <i class="material-icons" style="color: #BA2879;">description</i>Solicitações
                    </a>
                    <ul>
                        <li>
                            <a href="{{ url('Solicitacoes/ReportarErro' )}}" class="{{ Request::segment(1) === 'Solicitacoes' ? 'active' : null }}">
                                <i class="material-icons">bug_report</i>Reportar Erro
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('Solicitacoes/MaterialPropaganda' )}}" class="{{ Request::segment(1) === 'Solicitacoes' ? 'active' : null }}">
                                <i class="material-icons">volume_up</i>Material de propaganda
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('Solicitacoes/MapaVendedores' )}}" class="{{ Request::segment(1) === 'Solicitacoes' ? 'active' : null }}">
                                <i class="material-icons">recent_actors</i>Mapa de vendedores
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="{{ url('Salario' )}}" class="{{ Request::segment(1) === 'Salario' ? 'active' : null }}">
                        <i class="material-icons" style="color: #1c8a43;">attach_money</i>Seu Salário
                    </a>
                    <ul>
                        <li>
                            <a href="{{ url('Salario/Consultar' )}}" class="{{ Request::segment(1) === 'Salario' ? 'active' : null }}">
                                <i class="material-icons">search</i>Consultar
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('Salario/Historico' )}}" class="{{ Request::segment(1) === 'Salario' ? 'active' : null }}">
                                <i class="material-icons">history</i>Ver histórico
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-options">
                    <div class="row">
                        <div class="grid-m-6 grid-s-6 grid-xs-6" style="padding-right: 0px;">
                            <a href="{{ url('Usuario' )}}">
                                <i class="material-icons">person</i>Perfil
                            </a>
                        </div>
                        <div class="grid-m-6 grid-s-6 grid-xs-6" style="padding-left: 0px;">
                            <a href="{{ url('Login/logout/' )}}">
                                <i class="material-icons">arrow_forward</i>Logout
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </div>

</div>