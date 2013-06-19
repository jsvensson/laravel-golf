@extends('layout.default')

@section('content')

  <h2>{{ $contest->name }}</h2>

  <p>Ägare: <a href="{{ route('player.show', $contest->owner->id) }}">{{ $contest->owner->full_name }}</a></p>

  <p>Spelare: <a href="{{ route('contest.players.index', $contest->id) }}">{{ $contest->player_count }}</a></p>

@stop
