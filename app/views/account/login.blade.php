@extends('layouts.default')

@section('content')
  <h2>Inloggning</h2>

{{ Form::open() }}

  <div>
    {{ Form::label('email', 'Email') }} <br>
    {{ Form::email('email') }} {{ $errors->first('email') }}
  </div>

  <div>
    {{ Form::label('password', 'Lösenord') }} <br>
    {{ Form::password('password') }} {{ $errors->first('password') }}
  </div>

  <div>
    {{ Form::submit('Logga in') }}
  </div>

{{ Form::close() }}

@stop
