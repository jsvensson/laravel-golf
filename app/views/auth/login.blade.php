@extends('layout.default')

@section('content')

{{ Former::horizontal_open() }}

  {{ Former::email('email')->label('Email')->placeholder('Email') }}
  {{ Former::password('password')->label('Lösenord')->placeholder('Lösenord') }}
  {{ Former::large_primary_submit('Logga in') }}

{{ Former::close() }}

@stop
