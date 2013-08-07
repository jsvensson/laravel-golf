@extends('layout.default')

@section('content')

  {{ Breadcrumbs::render('contest.event.create', $contest) }}

  <h2>Skapa event för {{ $contest->name }}</h2>

  <p>En event samlar deltagarnas resultat för tex en bana eller en dags spelande.</p>

  <p>TODO: funktion för att automatiskt skapa events för ett angivet antal banor.</p>

  {{ Former::horizontal_open()
       ->action(URL::route('contest.event.store', $contest->id)) }}

    {{ Former::date('date')
         ->label('Datum')
         ->placeholder($contest->start_date)
         ->value($contest->start_date)  }}

    {{ Former::text('name')
         ->label('Beskrivning')
         ->placeholder('Bana 1') }}

    {{ Former::large_primary_submit('Skapa event') }}

  {{ Former::close() }}

  <a href="{{ URL::route('contest.show', $contest->id) }}">Tillbaka till tävling</a>

@stop
