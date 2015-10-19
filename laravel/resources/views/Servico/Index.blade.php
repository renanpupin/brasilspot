
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Descrição</th>
        </tr>
    </thead>

    <tbody>
    @foreach($servicos as $servico)
        <tr>
            <td>{{ $servico->id }}</td>
            <td>{{ $servico->descricao }}</td>
            <td>{!! link_to_route('Servico.edit', $title = 'Alterar', $parameters = $servico->id, $attributes = array('class' => 'btn btn-primary')) !!}</td>
            <td>{!! link_to_route('Servico.show', $title = 'Detalhar', $parameters = $servico->id, $attributes = array('class' => 'btn btn-primary')) !!}</td>
            <td>{!! link_to_action('ServicoController@destroy', $title = 'Remover', $parameters = $servico->id, $attributes = array('class' => 'btn btn-primary')) !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
