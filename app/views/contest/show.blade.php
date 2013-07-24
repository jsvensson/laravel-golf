@extends('layout.default')

@section('content')

  <h2>{{ $contest->name }}</h2>

  <p>Skapare: <a href="{{ route('contest.players.show', [$contest->id, $contest->owner->id]) }}">{{ $contest->owner->full_name }}</a></p>

  <p><a href="{{ route('contest.players.index', $contest->id) }}">Visa {{ $contest->players->count() }} deltagare</a></p>

  <p><a href="{{ URL::route('contest.event.index', $contest->id) }}">Visa {{ $contest->events->count() }} events</a></p>

  <p><a href="{{ route('contest.event.create', $contest->id) }}">Skapa event</a></p>

@stop
