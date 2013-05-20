@extends('layout.default')

@section('content')
  <h2>Skapa ny tävling</h2>

  {{ Form::open() }}

  {{ Form::label('name', 'Tävlingens namn') }}
  {{ Form::text('name', false, ['placeholder' => 'Namn']) }} {{ $errors->first('name') }}

  {{ Form::label('date_start', 'Startdatum') }}
  {{ Form::text('date_start', false, ['placeholder' => '2013-05-27']) }} {{ $errors->first('date_start') }}

  {{ Form::label('date_end', 'Slutdatum') }}
  {{ Form::text('date_end', false, ['placeholder' => '2013-05-27']) }} {{ $errors->first('date_end') }}

  <br>

  {{ Form::submit('Skapa ny tävling') }}

  {{ Form::token() }}
  {{ Form::close() }}

  <h3>Att fixa</h3>
  <ul>
    <li>Bootstrapifiera HTML</li>
    <li>Datepicker för start/slutdatum</li>
    <li>Efter skapande, skicka till sida för att lägga till spelare</li>
  </ul>


@stop
