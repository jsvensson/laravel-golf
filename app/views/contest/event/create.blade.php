@extends('layout.default')

@section('content')

  <h2>Skapa event för {{ $contest->name }}</h2>

  <p>En event samlar deltagarnas resultat för tex en bana eller en dags spelande.</p>

  <p>TODO: funktion för att automatiskt skapa events för ett angivet antal banor.</p>

  {{ Form::open(['route' => ['contest.event.store', $contest->id], 'class' => 'form-horizontal']) }}

  <div class="control-group">
    <label class="control-label" for="first_name">Datum</label>
    <div class="controls">
      <input type="text" id="date" name="date" placeholder="{{ $contest->start_date }}" value="{{ $contest->start_date }}">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="first_name">Beskrivning</label>
    <div class="controls">
      <input type="text" id="description" name="description" placeholder="Bana 1">
    </div>
  </div>

  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Skapa event</button>
    </div>
  </div>


  {{ Form::close() }}

  <a href="{{ URL::route('contest.show', $contest->id) }}">Tillbaka till tävling</a>

@stop
