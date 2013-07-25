@extends('layout.default')

@section('content')
  <h2>Registrera ny användare</h2>

  {{ Former::horizontal_open() }}
    {{ Former::email('email') }}
    {{ Former::text('first_name')->label('Förnamn') }}
    {{ Former::text('last_name')->label('Efternamn') }}
    {{ Former::password('password')->label('Lösenord') }}
    {{ Former::password('password_confirmation')->label('Upprepa lösenord') }}
    {{ Former::large_primary_submit('Registrera konto') }}
  {{ Former::close() }}

@stop
