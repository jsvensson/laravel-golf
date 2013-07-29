@extends('layout.default')

@section('content')

  {{ Breadcrumbs::render('contest', $contest) }}

  <h2>{{ $contest->name }}</h2>

  <p>Skapare: <a href="{{ route('contest.players.show', [$contest->id, $contest->owner->id]) }}">{{ $contest->owner->full_name }}</a></p>

  <p><a href="{{ route('contest.players.index', $contest->id) }}">Visa {{ $contest->players->count() }} deltagare</a></p>

  <p><a href="{{ URL::route('contest.event.index', $contest->id) }}">Visa {{ $contest->events->count() }} events</a></p>

  <p><a href="{{ route('contest.event.create', $contest->id) }}">Skapa event</a></p>

  <table class="table table-striped table-hover">
    <tr>
      <th></th>
    @foreach($contest->events as $event)
      <th>{{ $event->name }}</th>
    @endforeach
      <th>Summa</th>
    </tr>
    <tr>
    @foreach($contest->players as $player)
      <td>{{ $player->initial_name }}</td>
    @endforeach
    </tr>
  </table>

@stop
