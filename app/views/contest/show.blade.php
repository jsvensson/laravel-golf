@extends('layout.default')

@section('content')

  <h2>{{ $contest->name }}</h2>

  <p>Ägare: <a href="{{ route('player.show', $contest->owner->id) }}">{{ $contest->owner->full_name }}</a></p>

  <p><a href="{{ route('contest.players.index', $contest->id) }}">Visa {{ $contest->player_count }} deltagare</a></p>

@stop
