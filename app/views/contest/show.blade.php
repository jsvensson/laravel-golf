@extends('layout.default')

@section('content')

  {{ Breadcrumbs::render('contest.show', $contest) }}

  <h2>{{ $contest->name }}</h2>

  <ul>
    <li>Skapare: <a href="{{ route('contest.player.show', [$contest->id, $contest->owner->id]) }}">{{ $contest->owner->full_name }}</a></li>
    <li><a href="{{ route('contest.player.index', $contest->id) }}">Visa {{ $contest->players->count() }} deltagare</a></li>
    <li><a href="{{ URL::route('contest.event.index', $contest->id) }}">Visa {{ $contest->events->count() }} events</a></li>
@if($user)
    <li><a href="{{ route('contest.player.edit', [$contest->id, $user->id]) }}">Redigera mina events</a></li>
@endif
  </ul>

@if($is_owner)
  <h3>Ägar-kontroller</h3>
  <ul>
    <li><a href="{{ route('contest.player.create', $contest->id) }}">Lägg till spelare</a></li>
    <li><a href="{{ route('contest.event.create', $contest->id) }}">Skapa event</a></li>
    <li><a href="{{ route('contest.edit', $contest->id) }}">Redigera tävling</a></li>
  </ul>
@endif

  <table class="table table-condensed table-striped table-hover">
    <tr>
      <th></th>
    @foreach($contest->events as $event)
      <th>{{ $event->name }}</th>
    @endforeach
      <th>Summa</th>
    </tr>
    @foreach($contest->players as $player)
    <tr>
      <td>{{ $player->initial_name }}</td>
      @foreach($player->eventsForContest($contest->id)->get() as $event)
        <td class="contest score">{{ ($event->pivot->score != '') ? $event->pivot->score : '<span class="contest no-score">&mdash;</span>' }}</td>
      @endforeach
      <td class="contest score-sum">{{ $player->scoreForContest($contest->id) }}</td>
    </tr>
    @endforeach
  </table>

@stop
