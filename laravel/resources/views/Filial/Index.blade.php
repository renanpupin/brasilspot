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
        <h2>Listar Filiais</h2>
        @can('AcessoComerciante')
        @if($numero_assinaturas > 0 )
            <p>No momento você pode ter <b>{{$numero_assinaturas}}</b> filial(is). Para adicionar mais filiais é necessário adquirir novas assinaturas.</p>
        @endif
        @if($numero_assinaturas == 0 )
            <p>No momento você não pode adicionar mais filiais. Se deseja adicionar mais filiais adquira novas assinaturas.</p>
        @endif
        @endcan
    </div>

    @if($numero_assinaturas == 0)
        <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
    @endif
    @if($numero_assinaturas > 0)
    <div id="breadcrumbs" class="grid-m-9 grid-s-9 grid-xs-12">
    @endif
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('SuasFiliais') }}">Suas Filiais</a></li>
                    <li>Listar</li>
                </ul>
            </div>
        </div>
    </div>

    @if($numero_assinaturas > 0)
        <div class="grid-m-3 grid-s-3 grid-xs-12">
            <a id="btnNovo" class="btn btn-primary ripple" style="margin-top: 25px;" href="{{ url('SuasFiliais/cadastrar') }}">
                <span class="text-content">Novo</span>
            </a>
        </div>
    @endif
    <div id="listagem" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="table-responsive">
            <table id="listaFiliais" class="table">
                <thead>
                    <th>#</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Principal</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                @foreach($filiais as $filial)
                    <tr>
                        <td>{{ $filial->id }}</td>
                        <td>{{ $filial->Endereco->cidade }}</td>
                        <td>{{ $filial->Endereco->estado }}</td>
                        <td>{{ $filial->Endereco->lat }}</td>
                        <td>{{ $filial->Endereco->lon }}</td>
                        @if($filial->isPrincipal == 1)
                            <td>
                                <i class="material-icons">thumb_up</i>Sim
                            </td>
                        @endif
                        @if($filial->isPrincipal == 0)
                            <td>
                                <i class="material-icons">thumb_down</i>Não
                            </td>
                        @endif
                        {{--<td>--}}
                            {{--<i class="material-icons" title="Comércio">store</i>Comércio--}}
                            {{--<!-- <i class="material-icons" title="Serviço">work</i>--}}
                                 {{--<i class="material-icons" title="Atração">mood</i> -->--}}
                        {{--</td>--}}

                        {{--<td class="col-actions">--}}
                            {{--<a href="{{ route('SuasFiliais.show', array('id' => $filial->id))}}" title="Detalhar"><i class="material-icons">description</i></a>--}}
                        {{--</td>--}}
                        <td class="col-actions">
                            <a href="{{ url('SuasFiliais/visualizar', $filial->id) }}" title="Detalhar"><i class="material-icons">description</i></a>
                        </td>
                        <td class="col-actions">
                            <a href="{{ url('SuasFiliais/editar', $filial->id) }}" title="Editar"><i class="material-icons">mode_edit</i></a>
                        </td>
                        <td class="col-actions">
                            {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['Filial.destroy', $filial->id]
                            ]) !!}
                            {!! Form::button('<i class="material-icons">delete</i>', ['title' => 'Remover', 'type' => 'submit', 'class' => 'btnRemove']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop


@section('script')
    <script type="text/javascript" src="{!! asset('assets/js/filial/filial.js') !!}"></script>
@stop