@extends('layout.default')

@section('content')
  <h2>Skapa ny tävling</h2>

  {{ Former::open()->action(URL::route('contest.store')) }}
  {{ Former::text('name')
      ->label('Tävlingens namn')
      ->placeholder('Namn') }}

  {{ Former::date('start_date')
      ->label('Startdatum')
      ->placeholder('2013-08-01') }}

  {{ Former::date('end_date')
      ->label('Slutdatum')
      ->placeholder('2013-08-01') }}

  {{ Former::large_primary_submit('Skapa tävling') }}
  {{ Former::hidden('owner_id', $user->id) }}
  {{ Former::close() }}

@stop
