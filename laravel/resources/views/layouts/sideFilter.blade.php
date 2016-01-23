<div class="row">

    <div class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="side-filter">
            <div class="filter-title side-filter-empreendimento {{ Request::segment(1) === 'Promocoes' ? 'active' : null }}">
                <a href="{{url('Promocoes')}}" style="color: #E6BD35;"><i class="material-icons">local_offer</i>Promoções</a>
            </div>
        </div>
    </div>

    <div class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="side-filter">
            {{--<div class="filter-title side-filter-empreendimento active">--}}
            <div class="filter-title side-filter-empreendimento {{($tipo === null ? 'active' : null)}}">
                <a href="{{url(Request::path().(sizeof(Request::input()) > 0 ? "?" : null).(sizeof(Request::input("local")) > 0 ? "local=".(Request::input("local")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null).(sizeof(Request::input("tipo")) > 0 ? "" : "&").(sizeof(Request::input("pesquisaEmpresa")) > 0 ? ("pesquisaEmpresa=".Request::input("pesquisaEmpresa")) : null).(sizeof(Request::input("pesquisaEndereco")) > 0 ? ("&pesquisaEndereco=".Request::input("pesquisaEndereco")) : null))}}"><i class="material-icons">dashboard</i>Todos</a>
            </div>
            <div class="filter-title side-filter-empreendimento {{($tipo === "comercios" ? 'active' : null)}}">
                <a href="{{url(Request::path()."?tipo=comercios".(sizeof(Request::input("local")) > 0 ? "&local=".(Request::input("local")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null).(sizeof(Request::input("pesquisaEmpresa")) > 0 ? ("&pesquisaEmpresa=".Request::input("pesquisaEmpresa")) : null).(sizeof(Request::input("pesquisaEndereco")) > 0 ? ("&pesquisaEndereco=".Request::input("pesquisaEndereco")) : null))}}"><i class="material-icons">store_mall_directory</i>Comércios</a>
            </div>
            <div class="filter-title side-filter-empreendimento {{($tipo === "servicos" ? 'active' : null)}}">
                <a href="{{url(Request::path()."?tipo=servicos".(sizeof(Request::input("local")) > 0 ? "&local=".(Request::input("local")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null).(sizeof(Request::input("pesquisaEmpresa")) > 0 ? ("&pesquisaEmpresa=".Request::input("pesquisaEmpresa")) : null).(sizeof(Request::input("pesquisaEndereco")) > 0 ? ("&pesquisaEndereco=".Request::input("pesquisaEndereco")) : null))}}"><i class="material-icons">build</i>Serviços</a>
            </div>
            <div class="filter-title side-filter-empreendimento {{($tipo === "atracoes" ? 'active' : null)}}">
                <a href="{{url(Request::path()."?tipo=atracoes".(sizeof(Request::input("local")) > 0 ? "&local=".(Request::input("local")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null).(sizeof(Request::input("pesquisaEmpresa")) > 0 ? ("&pesquisaEmpresa=".Request::input("pesquisaEmpresa")) : null).(sizeof(Request::input("pesquisaEndereco")) > 0 ? ("&pesquisaEndereco=".Request::input("pesquisaEndereco")) : null))}}"><i class="material-icons">mood</i>Atrações</a>
            </div>
            <div class="filter-title side-filter-empreendimento {{($tipo === "profissionais" ? 'active' : null)}}">
                <a href="{{url(Request::path()."?tipo=profissionais".(sizeof(Request::input("local")) > 0 ? "&local=".(Request::input("local")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null).(sizeof(Request::input("pesquisaEmpresa")) > 0 ? ("&pesquisaEmpresa=".Request::input("pesquisaEmpresa")) : null).(sizeof(Request::input("pesquisaEndereco")) > 0 ? ("&pesquisaEndereco=".Request::input("pesquisaEndereco")) : null))}}"><i class="material-icons">school</i>Profissionais</a>
            </div>
        </div>
    </div>

    <div class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="side-filter">
            <div class="filter-title">
                <h6>Categorias</h6>
            </div>

            <div class="filter-list">
                <ul>
                    @foreach ($categorias as $id => $nome)
                        <li>
                            {{--{{dd(Request::segment(2))}}--}}
                            <a href="{{url((Request::segment(1) ? "/".Request::segment(1) : null).(Request::segment(2) == null ? "/".str_slug($nome) : null).(sizeof(Request::input()) > 0 ? "?" : null).(sizeof(Request::input("tipo")) > 0 ? "tipo=".(Request::input("tipo")) : null).(sizeof(Request::input("local")) > 0 ? (sizeof(Request::input("tipo")) > 0 ? "&" : null)."local=".(Request::input("local")) : null).(sizeof(Request::input("com")) > 0 ? (sizeof(Request::input("local")) > 0 ? "&" : null).("com=".Request::input("com")) : null))}}">-{{$nome}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="side-filter">
            <div class="filter-title">
                <h6>Subcategorias</h6>
            </div>

            <div class="filter-list">
                <ul>
                    @foreach ($subcategorias as $id => $nome)
                        <li>
                            <a href="{{url((Request::segment(1) ? "/".Request::segment(1) : null).(Request::segment(2) ? "/".str_slug($nome) : null).(Request::segment(3) ? "/".Request::segment(3) : null).(sizeof(Request::input()) > 0 ? "?" : null).(sizeof(Request::input("tipo")) > 0 ? "tipo=".(Request::input("tipo")) : null).(sizeof(Request::input("local")) > 0 ? (sizeof(Request::input("tipo")) > 0 ? "&" : null)."local=".(Request::input("local")) : null).(sizeof(Request::input("com")) > 0 ? (sizeof(Request::input("local")) > 0 ? "&" : null).("com=".Request::input("com")) : null))}}">-{{$nome}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="side-filter">
            <div class="filter-title">
                <h6>Serviços</h6>
            </div>

            <div class="filter-list">
                <input type="text" class="search-list" placeholder="Filtrar" id="inputFiltrarServicos">
                <ul id="listaServicos">
                    @foreach ($servicos as $id => $descricao)
                        <li>
                            <label>
                                {{--<input type="checkbox" name="servicos[]" value="{{str_slug($descricao)}}">--}}
                                {!! Form::checkbox('servicos[]', str_slug($descricao), in_array($id, $servicos_selecionados_id), ['class' => '']) !!}
                                 {{$descricao}}
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="side-filter">
            <div class="filter-title">
                <h6>Estado</h6>
            </div>

            <div class="filter-list">
                <input type="text" class="search-list" placeholder="Filtrar" id="inputFiltrarEstado">
                <ul id="listaEstados">
                    <li>
                        <a href="{{url(Request::path()."?local=ac".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Acre</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=al".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Alagoas</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=ap".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Amapá</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=am".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Amazonas</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=ba".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Bahia</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=ce".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Ceará</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=df".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Distrito Federal</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=es".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Espírito Santo</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=go".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Goiás</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=ma".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Maranhão</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=mt".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Mato Grosso</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=ms".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Mato Grosso do Sul</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=mg".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Minas Gerais</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=pa".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Pará</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=pb".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Paraíba</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=pr".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Paraná</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=pe".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Pernambuco</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=pi".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Piauí</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=rj".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Rio de Janeiro</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=rn".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Rio Grande do Sul</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=rs".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Rio Grande do Norte</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=ro".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Rondônia</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=rr".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Roraima</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=sc".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Santa Catarina</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=sp".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- São Paulo</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=se".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Sergipe</a>
                    </li>
                    <li>
                        <a href="{{url(Request::path()."?local=to".(sizeof(Request::input("tipo")) > 0 ? ("&tipo=".Request::input("tipo")) : null).(sizeof(Request::input("com")) > 0 ? ("&com=".Request::input("com")) : null))}}">- Tocantins</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>