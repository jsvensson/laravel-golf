@extends('layout.default')

@section('content')

  <h2>{{ $contest->name }}</h2>

  <p>Skapare: <a href="{{ route('contest.players.show', [$contest->id, $contest->owner->id]) }}">{{ $contest->owner->full_name }}</a></p>

  <p><a href="{{ route('contest.players.index', $contest->id) }}">Visa {{ $contest->player_count }} deltagare</a></p>

@stop
