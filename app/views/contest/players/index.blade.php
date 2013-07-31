@extends('layout.default')

@section('content')

  {{ Breadcrumbs::render('players', $contest) }}

  <h2>Deltagare i tävling {{ $contest->id }}</h2>

  <ul>
  @foreach ($contest->players as $player)
    <li><a href="{{ URL::route('contest.players.show', [$contest->id, $player->id]) }}">{{ $player->full_name }}</a></li>
  @endforeach
  </ul>

  <a href="{{ URL::route('contest.show', $contest->id) }}">Tillbaka till tävling</a>

@stop
