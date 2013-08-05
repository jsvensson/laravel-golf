@extends('layout.default')

@section('content')

  {{ Breadcrumbs::render('contest.player.index', $contest) }}

  <h2>Deltagare i tävling {{ $contest->id }}</h2>

  <ul>
  @foreach ($contest->players as $player)
    <li><a href="{{ URL::route('contest.player.show', [$contest->id, $player->id]) }}">{{ $player->full_name }}</a></li>
  @endforeach
  </ul>

  <a href="{{ URL::route('contest.show', $contest->id) }}">Tillbaka till tävling</a>

@stop
