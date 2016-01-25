<div id="sidebar">
    <div class="sidebar-hamburger grid-m-12 grid-xs-3">
        <span class="toggleMenu text-menu"><i class="material-icons">menu</i></span>
    </div>
    {{--<div class="sidebar-logo grid-m-12 grid-xs-1">--}}
    {{--<img src="{!! asset('assets/img/logo.00_png_srb') !!}">--}}
    {{--</div>--}}
    <div class="sidebar-logo-text grid-m-12 grid-xs-7">
        <img class="brand-text" src="{!! asset('assets/img/logo_final.png') !!}">
    </div>

    <div class="sidebar-menu grid-m-12 grid-xs-12">
        <nav id="sideMenu" class="navbar" role="navigation">
            <div class="menu-text text-menu">
                <span class="toggleMenuDesligado"><i class="material-icons">menu</i></span>
                MENU
            </div>
            <ul role="menu">
                <li>
                    <a href="{{ url('Dashboard' )}}" class="{{ Request::segment(1) === 'Dashboard' ? 'active' : null }}">
                        <i class="material-icons" style="color: #DB0465;">dashboard</i>Dashboard
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
                {{--<li>--}}
                    {{--<a href="{{ url('Metas' )}}" class="{{ Request::segment(1) === 'Metas' ? 'active' : null }}">--}}
                        {{--<i class="material-icons" style="color: #A32995;">trending_up</i>Metas--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="{{ url('TipoMeta' )}}" class="{{ Request::segment(1) === 'TipoMeta' ? 'active' : null }}">--}}
                        {{--<i class="material-icons" style="color: #A32995;">trending_up</i>Tipos de Meta--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="submenu">--}}
                    {{--<a href="{{ url('Vendedores' )}}" class="{{ Request::segment(1) === 'Vendedor' ? 'active' : null }}">--}}
                        {{--<i class="material-icons" style="color: #266CAD;">person</i>Vendedores--}}
                    {{--</a>--}}
                    {{--<ul>--}}
                        {{--<li>--}}
                            {{--<a href="{{ url('Clientes/Gerenciar' )}}" class="">--}}
                                {{--<i class="material-icons">person_add</i>Gerenciar seus clientes--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="{{ url('Cliente/Edicoes' )}}" class="">--}}
                        {{--<i class="material-icons">sync_problem</i>Edições não aprovadas--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="{{ url('Vendedor/Reclamacoes' )}}" class="">--}}
                                {{--<i class="material-icons">mood_bad</i>Reclamações (3)--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="{{ url('Vendedor/MapaVendedores' )}}" class="">--}}
                                {{--<i class="material-icons">recent_actors</i>Mapa de vendedores--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="{{ url('Vendedor/VincularMetas' )}}" class="">--}}
                                {{--<i class="material-icons">playlist_add</i>Vincular Metas--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="{{ url('Cliente/EmpresasDesativadas' )}}" class="{{ Request::segment(1) === 'EmpresasDesativadas' ? 'active' : null }}">--}}
                        {{--<i class="material-icons">location_off</i>Empresas desativadas--}}
                        {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                <li class="submenu">
                    <a href="{{ url('Comerciantes' )}}" class="{{ Request::segment(1) === 'Cliente' ? 'active' : null }}">
                        <i class="material-icons" style="color: #DB0465;">business</i>Comerciantes
                    </a>
                    <ul>
                        <li>
                            <a href="{{ url('comerciantes/gerenciar' )}}" class="">
                            <i class="material-icons">person_add</i>Gerenciar
                            </a>
                        </li>
                        {{--<li>--}}
                        {{--<a href="{{ url('Cliente/Edicoes' )}}" class="">--}}
                        {{--<i class="material-icons">sync_problem</i>Edições não aprovadas--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="{{ url('Clientes/Reclamacoes' )}}" class="">--}}
                                {{--<i class="material-icons">person</i>Buscar Perfil--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="{{ url('Cliente/Reclamacoes' )}}" class="">--}}
                                {{--<i class="material-icons">mood_bad</i>Reclamações (3)--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="{{ url('Cliente/EmpresasDesativadas' )}}" class="{{ Request::segment(1) === 'EmpresasDesativadas' ? 'active' : null }}">--}}
                        {{--<i class="material-icons">location_off</i>Empresas desativadas--}}
                        {{--</a>--}}
                        {{--</li>--}}
                    </ul>
                </li>
                {{--<li class="submenu">--}}
                    {{--<a href="{{ url('Solicitacoes' )}}" class="{{ Request::segment(1) === 'Erros' || Request::segment(1) === 'Solicitacoes' || Request::segment(2) === 'MaterialPropaganda' ? 'active' : null }}">--}}
                        {{--<i class="material-icons" style="color: #BA2879;">description</i>Solicitações--}}
                    {{--</a>--}}
                    {{--<ul>--}}
                        {{--<li>--}}
                            {{--<a href="{{ url('Solicitacoes/ReportarErro' )}}" class="">--}}
                                {{--<i class="material-icons">bug_report</i>Erros Reportados (2)--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="{{ url('Solicitacoes/MaterialPropaganda' )}}" class="">--}}
                                {{--<i class="material-icons">volume_up</i>Pedido de Materiais (5)--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                <li>
                    <a href="{{ url('SuasMensagens' )}}" class="{{ Request::segment(1) === 'SuasMensagens' || Request::segment(1) === 'NovaMensagem'? 'active' : null }}">
                        {{--<i class="material-icons" style="color: #A32995;">mail</i>Mensagens ({{$numero_mensagens}})--}}
                    </a>
                </li>
                <li>
                    <a href="{{ url('MapaVendas' )}}" class="{{ Request::segment(1) === 'MapaVendas' ? 'active' : null }}">
                        <i class="material-icons" style="color: #11939C;">place</i>Mapa de Vendas
                    </a>
                </li>
                <li class="menu-options">
                    <div class="row">
                        <div class="grid-m-6 grid-s-6 grid-xs-6" style="padding-right: 0px;">
                            <a href="{{ url('Perfil' )}}" class="{{ Request::segment(1) === 'Perfil' ? 'active' : null }}">
                                <i class="material-icons">person</i>Perfil
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