<table class="table">
    <thead>
        <th>Nome do Empreendedor</th>
        <th>Razao Social</th>
        <th>Nome Fantasia</th>
        <th>Slogan</th>
        <th>CPF/CNPJ</th>
        <th>E-mail</th>
        <th>Descricao</th>
        <th>Horario de Funcionamento</th>
        <th>Atende em Casa</th>
        <th>Facebook</th>
        <th>WhatsApp</th>
    </thead>
    <tbody>
    @foreach($empresas as $empresa)
        <tr>
            <td>{{ $empresa->NomeEmpreendedor }}</td>
            <td>{{ $empresa->RazaoSocial }}</td>
            <td>{{ $empresa->NomeFantasia }}</td>
            <td>{{ $empresa->Slogan }}</td>
            <td>{{ $empresa->CpfCnpj }}</td>
            <td>{{ $empresa->Email }}</td>
            <td>{{ $empresa->Descricao }}</td>
            <td>{{ $empresa->HorarioFuncionamento }}</td>
            <td>{{ $empresa->AtendeCasa }}</td>
            <td>{{ $empresa->LinkFacebook  }}</td>
            <td>{{ $empresa->NumeroWhatsApp }}</td>
        </tr>
    @endforeach
    </tbody>
</table>