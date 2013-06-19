@extends('layout.default')

@section('content')
  <h2>Registrera ny användare</h2>

  {{ Form::open() }}

  <div>
    {{ Form::label('email', 'Email') }} <br>
    {{ Form::email('email') }} {{ $errors->first('email') }}
  </div>

  <div>
    {{ Form::label('first_name', 'Förnamn') }} <br>
    {{ Form::text('first_name') }} {{ $errors->first('first_name') }}
  </div>

  <div>
    {{ Form::label('last_name', 'Efternamn') }} <br>
    {{ Form::text('last_name') }} {{ $errors->first('last_name') }}
  </div>

  <div>
    {{ Form::label('password', 'Lösenord') }} <br>
    {{ Form::password('password') }} {{ $errors->first('password') }}
  </div>

  <div>
    {{ Form::label('password_confirmation', 'Upprepa lösenord') }} <br>
    {{ Form::password('password_confirmation') }} {{ $errors->first('password_confirmation') }}
  </div>

  <div>
    {{ Form::token() }}
    {{ Form::submit('Registrera konto') }}
  </div>
@stop
