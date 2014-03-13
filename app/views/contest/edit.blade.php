@extends('layout.default')

@section('content')

  {{ Breadcrumbs::render('contest.edit', $contest) }}

  <h2>Redigera tävling</h2>

  {{ Former::horizontal_open()
      ->action(URL::route('contest.update', $contest->id))
      ->method('put') }}
  {{ Former::populate($contest) }}
  {{ Former::text('name')
      ->label('Namn')
      ->placeholder('Tävling') }}
  {{ Former::date('start_date')
      ->label('Startdatum') }}
  {{ Former::date('end_date')
      ->label('Slutdatum') }}
  {{ Former::submit() }}
  {{ Former::close() }}

@stop
