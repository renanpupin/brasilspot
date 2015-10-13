{!! Form::Open(['route' => 'Empresa.store', 'method' => 'POST']) !!}
    <div class="form-group">
        {!! Form::label('Nome do Empreendedor:') !!}
        {!! Form::text('nomeEmpreendedor',null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Usuario:') !!}
        {!! Form::select('usuarios', $usuarios) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Tipo Empresa:') !!}
        {!! Form::select('tiposEmpresas', $tiposEmpresas) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Plano:') !!}
        {!! Form::select('planos', $planos) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Vendedor:') !!}
        {!! Form::select('vendedores', $vendedores) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Razão Social:') !!}
        {!! Form::text('razaoSocial',null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
         {!! Form::label('Nome Fantasia:') !!}
         {!! Form::text('nomeFantasia',null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
         {!! Form::label('Slogan:') !!}
         {!! Form::text('slogan',null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
         {!! Form::label('CPF/CNPJ:') !!}
         {!! Form::text('cpfCnpj',null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
         {!! Form::label('E-mail:') !!}
         {!! Form::text('email',null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
         {!! Form::label('Descrição:') !!}
         {!! Form::text('descricao',null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
         {!! Form::label('Horario de Funcionamento:') !!}
         {!! Form::text('horarioFuncionamento',null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
         {!! Form::label('Atende em casa?') !!}
         {!! Form::checkbox('atendeCasa') !!}
    </div>
    <div class="form-group">
         {!! Form::label('Facebook:') !!}
         {!! Form::text('facebook',null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
         {!! Form::label('Whatsapp:') !!}
         {!! Form::text('whatsapp',null,['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}

{!! Form::Close() !!}