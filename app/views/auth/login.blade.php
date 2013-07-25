@extends('layout.default')

@section('content')

{{ Former::horizontal_open() }}

  {{ Former::email('email')->placeholder('Email') }}
  {{ Former::password('password')->placeholder('Lösenord') }}
  {{ Former::large_primary_submit('Logga in') }}

{{ Former::close() }}

@stop
