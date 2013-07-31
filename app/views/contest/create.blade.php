@extends('layout.default')

@section('content')
  <h2>Skapa ny tävling</h2>

  {{ Form::open(['route' => 'contest.store']) }}

  {{ Form::label('name', 'Tävlingens namn') }}
  {{ Form::text('name', false, ['placeholder' => 'Namn']) }} {{ $errors->first('name') }}

  {{ Form::label('start_date', 'Startdatum') }}
  {{ Form::text('start_date', false, ['placeholder' => '2013-05-27']) }} {{ $errors->first('start_date') }}

  {{ Form::label('end_date', 'Slutdatum') }}
  {{ Form::text('end_date', false, ['placeholder' => '2013-05-27']) }} {{ $errors->first('end_date') }}

  <br>

  {{ Form::submit('Skapa ny tävling') }}

  {{ Form::hidden('owner_id', $user->id) }}
  {{ Form::token() }}
  {{ Form::close() }}

  <h3>Att fixa</h3>
  <ul>
    <li>Bootstrapifiera HTML</li>
    <li>Datepicker för start/slutdatum</li>
    <li>Efter skapande, skicka till sida för att lägga till spelare</li>
  </ul>


@stop
