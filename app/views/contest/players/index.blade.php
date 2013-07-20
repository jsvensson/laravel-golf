@extends('layout.default')

@section('content')

  <h2>Deltagare i tävling {{ $contest->id }}</h2>

  <ul>
  @foreach ($contest->players as $player)
    <li>{{ $player->full_name }}</li>
  @endforeach
  </ul>

  <a href="{{ URL::route('contest.show', $contest->id) }}">Tillbaka till tävling</a>

@stop
