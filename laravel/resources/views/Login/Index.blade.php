@include('errors.Erros')

{!! Form::open(['route' => 'Login.store','method' => 'POST']) !!}
{!! Form::label('email','E-mail:') !!}
{!! Form::email('email', null,['class' => 'form-control']) !!}

{!! Form::label('password','Senha:') !!}
{!! Form::password('password', null,['class' => 'form-control']) !!}

{!! Form::submit('logar',['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}