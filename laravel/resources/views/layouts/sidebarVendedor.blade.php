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
                    <a href="{{ url('SeuDesempenho' )}}" class="{{ Request::segment(1) === 'SeuDesempenho' ? 'active' : null }}">
                        <i class="material-icons" style="color: #DB0465;">insert_chart</i>Seu Desempenho
                    </a>
                </li>
                <li>
                    <a href="{{ url('NovaEmpresa' )}}" class="{{ Request::segment(1) === 'NovaEmpresa' ? 'active' : null }}">
                        <i class="material-icons" style="color: #E66D1C;">account_balance</i>Nova Empresa
                    </a>
                </li>
                <li class="submenu">
                    <a href="{{ url('Clientes' )}}" class="{{ Request::segment(1) === 'Clientes' ? 'active' : null }}">
                        <i class="material-icons" style="color: #E6BD35;">person</i>Seus Clientes
                    </a>
                    <ul>
                        <li>
                            <a href="{{ url('Clientes/Gerenciar' )}}" class="">
                                <i class="material-icons">person_add</i>Gerenciar seus clientes
                            </a>
                        </li>
                        {{--<li>--}}
                        {{--<a href="{{ url('Cliente/Edicoes' )}}" class="">--}}
                        {{--<i class="material-icons">sync_problem</i>Edições não aprovadas--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        <li>
                            <a href="{{ url('Clientes/Reclamacoes' )}}" class="">
                                <i class="material-icons">mood_bad</i>Reclamações (3)
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('Clientes/Atualizacoes' )}}" class="">
                                <i class="material-icons" style="width: 28px;">updates</i>Atualizações (5)
                            </a>
                        </li>
                        {{--<li>--}}
                        {{--<a href="{{ url('Cliente/EmpresasDesativadas' )}}" class="{{ Request::segment(1) === 'EmpresasDesativadas' ? 'active' : null }}">--}}
                        {{--<i class="material-icons">location_off</i>Empresas desativadas--}}
                        {{--</a>--}}
                        {{--</li>--}}
                    </ul>
                </li>
                <li class="submenu">
                    <a href="{{ url('Solicitacoes' )}}" class="{{ Request::segment(1) === 'Solicitacoes' ? 'active' : null }}">
                        <i class="material-icons" style="color: #11939C;">description</i>Solicitações
                    </a>
                    <ul>
                        <li>
                            <a href="{{ url('Solicitacoes/ReportarErro' )}}" class="">
                                <i class="material-icons">bug_report</i>Reportar Erro
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('Solicitacoes/MaterialPropaganda' )}}" class="">
                                <i class="material-icons">volume_up</i>Material de propaganda
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="{{ url('Salario' )}}" class="{{ Request::segment(1) === 'Salario' ? 'active' : null }}">
                        <i class="material-icons" style="color: #266CAD;">attach_money</i>Seu Salário
                    </a>
                    <ul>
                        <li>
                            <a href="{{ url('Salario/Consultar' )}}" class="">
                                <i class="material-icons">search</i>Consultar
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('Salario/Historico' )}}" class="">
                                <i class="material-icons">history</i>Ver histórico
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('SuasMensagens' )}}" class="{{ Request::segment(1) === 'SuasMensagens' ? 'active' : null }}">
                        <i class="material-icons" style="color: #A32995;">mail</i>Mensagens
                    </a>
                </li>
                <li>
                    <a href="{{ url('MapaVendas' )}}" class="{{ Request::segment(1) === 'MapaVendas' ? 'active' : null }}">
                        <i class="material-icons" style="color: #11939C;">place</i>Mapa de Vendas
                    </a>
                </li>
                {{--<li>--}}
                    {{--<a href="{{ url('SuasPromocoes' )}}" class="{{ Request::segment(1) === 'SuasPromocoes' ? 'active' : null }}">--}}
                        {{--<i class="material-icons" style="color: #BA2879;">local_offer</i>Promoções--}}
                    {{--</a>--}}
                {{--</li>--}}
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